<?php 
//1. Бинарный поиск

function search(array $data, int $number) : int {
    $left = 0;
    $right = count($data);

    while ($left <= $right) {
        $mid = $left + intdiv(($right - $left), 2);
        if ($data[$mid] == $number) {
            return $mid;
        } elseif ($data[$mid] < $number) {
            $left = $mid + 1; //если current цифра меньше идем направо
        } else {
            $right = $mid - 1; //если current цифра больше то логично налево идем
        }
    }

    return -1;
}

echo search ([1, 2, 4, 6, 7, 8, 10], 2);

//2. Поиск выходных

function weekend (string $begin, string $end) : int {
    
    $timestampBegin = strtotime($begin);
    $timestampEnd = strtotime($end);
    $weekendDays = 0;
    for ($i = $timestampBegin; $i <= $timestampEnd; $i += 86400) /* увеличиваем на день вперед */ {
        $week =  date("l", $i);
        if ($week === 'Saturday' || $week === 'Sunday'){
            $weekendDays++;
        }

    }
    return $weekendDays;

}
  echo weekend ('06.06.2020', '06.06.2020');

//3. RGB

function rgb(int $r, int $g, int $b) : int {
    $r = min(255, max(0, $r)); 
    $g = min(255, max(0, $g));
    $b = min(255, max(0, $b));   
    $packedColor = ($r << 16) | ($g << 8) | $b;
    return $packedColor;
}
echo rgb (300, 0, 255);

//4. Последовательность Фибоначчи

function fiborow(int $limit) : string {
    $result = [];
    $a = 0;
    $b = 1;

    while ($a <= $limit) {
        $result[] = $a;
        [$a, $b] = [$b, $a + $b];
    }

    return implode(' ', $result);
}

echo fiborow(10);
