<?php

namespace Fagathe\Phplib\Helpers;

use DateTimeImmutable;

trait DateTimeTrait
{
    /**
     * now
     *
     * @return DateTimeImmutable
     */
    public function now(): DateTimeImmutable
    {
        return new DateTimeImmutable;
    }

    /**
     * @param DateTimeImmutable $originalDateTime
     *
     * @return bool|DateTimeImmutable
     */
    public function setDateTimeBetween(string $startDate = '-30 years', string $endDate = 'now', string $timezone = null): bool|DateTimeImmutable
    {
        $timezone = $timezone ?? date_default_timezone_get();
        $start = new DateTimeImmutable($startDate);
        $end = new DateTimeImmutable($endDate);

        $interval = $end->diff($start);
        $days = 0;

        if ($interval->y > 0) {
            $days += ($interval->y * 365);
        }
        if ($interval->m > 0) {
            $days += ($interval->m * 30);
        }
        if ($interval->d > 0) {
            $days += $interval->d;
        }

        return $start->modify('+' . random_int(0, $days) . ' days');
    }

    /**
     * @param DateTimeImmutable $originalDateTime
     *
     * @return bool|DateTimeImmutable
     */
    public function setDateTimeAfter(DateTimeImmutable $originalDateTime): bool|DateTimeImmutable
    {
        $now = new DateTimeImmutable();
        $interval = $now->diff($originalDateTime);
        $days = 0;

        if ($interval->y > 0) {
            $days += ($interval->y * 365);
        }
        if ($interval->m > 0) {
            $days += ($interval->m * 30);
        }
        if ($interval->d > 0) {
            $days += $interval->d;
        }

        return $originalDateTime->modify('+' . random_int(0, $days) . ' days');
    }

    /**
     * isDatePast
     *
     * @param  mixed $date
     * @return bool
     */
    public function isDatePast(DateTimeImmutable $date): bool {
        return $this->now() < $date;
    }
}
