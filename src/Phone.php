<?php


namespace Alura\Architecture;


class Phone
{
    private string $ddd;
    private string $phone;

    /**
     * Phone constructor.
     * @param string $ddd
     * @param string $phone
     */
    public function __construct(string $ddd, string $phone)
    {
        $this->setDdd($ddd);
        $this->setPhone($phone);
    }

    /**
     * @param string $ddd
     */
    public function setDdd(string $ddd): void
    {

        if (preg_match('/\d{2}/', $ddd) !== 1) {
            throw new \InvalidArgumentException('DDD inválido.');
        }

        $this->ddd = $ddd;
    }

    /**
     * @return string
     */
    public function getDdd(): string
    {
        return $this->ddd;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        if (preg_match('/\d{8,9}/', $phone) !== 1) {
            throw new \InvalidArgumentException('Número de telefone inválido.');
        }

        $this->phone = $phone;
    }

    public function __toString(): string
    {
        // TODO: Implement __toString() method.
        return "({$this->ddd}) {$this->phone}";
    }

}