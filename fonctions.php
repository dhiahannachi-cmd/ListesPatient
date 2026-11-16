<?php

function calculerFacture(int $age, float $tarifBase): float
{
    if ($age > 65) {
        $tarifBase = $tarifBase + $tarifBase * 0.2;
    }

    return $tarifBase;
}

function getBadgeService(string $code): array
{
    switch ($code) {
        case 'cardio':
            return ['libelle' => 'Cardiologie', 'classe' => 'badge-cardio'];
        case 'derma':
            return ['libelle' => 'Dermatologie', 'classe' => 'badge-derma'];
        case 'pediatre':
            return ['libelle' => 'Pédiatrie', 'classe' => 'badge-pediatre'];
        default:
            return ['libelle' => 'Service inconnu', 'classe' => 'badge-inconnu'];
    }
}

function filtrerUrgences(array $patients): array
{
    return array_values(array_filter($patients, fn($patient) => $patient['urgence'] === 'ROUGE'));
}

function getLibelleUrgence(string $code): string
{
    switch ($code) {
        case 'ROUGE':
            return 'Urgence absolue';
        case 'ORANGE':
            return 'Urgence relative';
        case 'VERT':
            return 'Consultation standard';
        default:
            return 'Niveau inconnu';
    }
}
?>