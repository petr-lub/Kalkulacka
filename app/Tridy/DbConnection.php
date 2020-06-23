<?php


namespace Tridy;

class DbConnection
{
    private $parameters;

    function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    function connectToDatabase(): Connection
    {
        return new Connection(
            $this->parameters['dsn'],
            $this->parameters['user'],
            $this->parameters['pwd'],
            $this->parameters['dbname']
        );
    }
}