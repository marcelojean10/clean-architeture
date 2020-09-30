<?php


namespace Alura\Architecture\Indication;


use Alura\Architecture\Student\Student;

class Indication
{
    private Student $indicator;
    private Student $indicated;
    private \DateTimeImmutable $date;

    /**
     * Indication constructor.
     * @param Student $indicator
     * @param Student $indicated
     */
    public function __construct(Student $indicator, Student $indicated)
    {
        $this->indicator = $indicator;
        $this->indicated = $indicated;

        $this->date = new \DateTimeImmutable();
    }
}