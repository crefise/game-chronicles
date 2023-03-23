<?php

namespace App\Adapters;

use App\Repositories\Interfaces\BillRepositoryInterface;

class TransactionAdapter {
    /**
     * TransactionAdapter construct
     *
     * @param BillRepositoryInterface $billRepository
     */
    public function __construct(private BillRepositoryInterface $billRepository)
    {
    }

    /**
     * Adapt data for creation transaction
     *
     * @param array $data
     * @return array
     */
    public function adaptBillDataForCreation(array $data): array
    {
        return [
            'cash'         => $data['cash'],
            'from_bill_id' => $this->billRepository->reset()->findByNumber($data['from'])->id,
            'to_bill_id'   => $this->billRepository->reset()->findByNumber($data['to'])->id,
            'description'  => $data['description'] ?? '',
        ];
    }
}
