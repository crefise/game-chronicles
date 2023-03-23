<?php

namespace App\Services\TransactionService;

use App\Adapters\TransactionAdapter;
use App\Models\Transaction;
use App\Models\User;
use App\Repositories\TransactionRepository;
use App\Services\CoreService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Log\Logger;

class TransactionService extends CoreService {
    /**
     * IN PROGRESS STATUS ID
     */
    const PROGRESS_STATUS_ID = 1;

    /**
     * IN SUCCESS STATUS ID
     */
    const SUCCESS_STATUS_ID = 2;

    /**
     * FAILED SUCCESS STATUS ID
     */
    const FAILED_STATUS_ID = 3;

    /**
     * TransactionService construct
     *
     * @param Logger $logger
     */
    public function __construct(
        Logger $logger,
        private TransactionAdapter $transactionAdapter,
    ) {
        parent::__construct($logger);
    }

    /**
     * Model class
     *
     * @return string
     */
    protected function model(): string
    {
        return Transaction::class;
    }

    /**
     * Repository class
     *
     * @return string
     */
    protected function repository(): string
    {
        return TransactionRepository::class;
    }

    /**
     * Create new transaction
     *
     * @param array $data
     * @return Transaction
     */
    public function createNewTransaction(array $data): Transaction
    {
        $creationData = $this->transactionAdapter->adaptBillDataForCreation($data);

        return $this->model->create([
            ...$creationData,
           'status_id' => self::PROGRESS_STATUS_ID,
        ]);
   }

    /**
     * Set transaction success
     *
     * @param Transaction $transaction
     */
    public function setSuccess(Transaction $transaction)
    {
        $transaction->update(['status_id' => self::SUCCESS_STATUS_ID]);
    }

    /**
     * Set transaction failed
     *
     * @param Transaction $transaction
     */
    public function setFailed(Transaction $transaction)
    {
        $transaction->update(['status_id' => self::FAILED_STATUS_ID]);
    }

    /**
     * Get all transactions for current user
     *
     * @return mixed
     */
    public function index(): Collection
    {
        /** @var User $user */
        $user = auth()->user();

        return $this->repository->all($user->id)->get();
    }
}
