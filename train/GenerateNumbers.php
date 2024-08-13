<?php

namespace train;

class GenerateNumbers
{
    public int $length;
    public int $count;

    public function __construct(int $length, int $count)
    {
        $this->length = $length;
        $this->count = $count;
    }

    public function generateUniqueNumbers(): void
    {
        $return_array = [];
        for ($i = 0; $i < $this->count; $i++) {
            $first_num = rand(pow(10, $this->length - 1), pow(10, $this->length) - 1);
            $second_num = $this->calculateLuhnCheckDigit($first_num);

            $return_array[$i] = [
                'first' => $first_num,
                'second' => $second_num
            ];
            $this->return_back($return_array);
        }
    }

    private function CalculateLuhnCheckDigit($number): int
    {
        $digits = str_split((string)$number);
        $index = 1;
        foreach ($digits as $key => $digit) {
            if ($index % 2 !== 0) {
                $digits[$key] = (int)$digit * 2;
                if ($digits[$key] >= 10) {
                    $temp = str_split((string)$digits[$key]);
                    $digits[$key] = $temp[0] + $temp[1];
                    unset($temp);
                }
            }
            $index++;
        }
        $middle_value = 0;
        for ($i = 0; $i < count($digits); $i++) {
            $middle_value = $middle_value + $digits[$i];
        }
        $value = 10 - (int)$middle_value % 10;
        return (int)$number . $value;
    }

    private function return_back($return_array): void
    {
        var_dump(json_encode($return_array));

    }
}

$length = $_GET["length"];
$count = $_GET["count"];

$start_time = microtime(true); // Засекаем время до выполнения кода

$random = new GenerateNumbers($length, $count);
$random->generateUniqueNumbers();

$end_time = microtime(true); // Засекаем время после выполнения кода

$execution_time = $end_time - $start_time; // Разница даст время выполнения
echo "Время выполнения скрипта: " . $execution_time . " секунд.";