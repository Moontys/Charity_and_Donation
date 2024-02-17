<?php

namespace App\Storage;

use App\Entity\Charity;

class CharityLocalStorage
{
    private array $data = [];

    public function add(Charity $charity): void
    {
        $this->data[] = $charity;
    }

    public function update(Charity $charity): void
    {
        $dataToStore = [];

        foreach($this->data as $charityToStore) {
            
            if ($charity->getId() !== $charityToStore->getId()) {
                $dataToStore[] = $charityToStore;
            }
        }
        $this->data = $dataToStore;
        $this->data[] = $charity;
    }

    public function delete($id): void
    {
        $dataToStore = [];

        foreach ($this->data as $charityToStore) {

            if ($id !== $charityToStore->getId()) {
                $dataToStore[] = $charityToStore;
            }
        }
        $this->data = $dataToStore;
    }

    public function getAll(): array
    {
        return $this->data;
    }

    public function getNextId(): int
    {
        $totalNumberIrArray = count($this->data) + 1;

        return $totalNumberIrArray;
    }

    public function doesExistsCharityId(int $charityId): bool
    {
        foreach ($this->data as $charity) {
            
            if ($charity->getId() === $charityId) {
                return true;
            }
        }
        return false;
    }
}