<?php

namespace Azuriom\Game\Server;

use Azuriom\Models\Server;

abstract class ServerBridge
{
    /**
     * The associated server.
     *
     * @var \Azuriom\Models\Server
     */
    protected $server;

    /**
     * ServerBridge constructor.
     * @param  Server  $server
     */
    public function __construct(Server $server)
    {
        $this->server = $server;
    }

    /**
     * Get all the server data
     *
     * @return array|null
     */
    abstract public function getServerData();

    /**
     * Get the online players on the server.
     *
     * @return int|null
     */
    public function getOnlinePlayers()
    {
        $data = $this->getServerData();

        return $data ? $data['players'] : null;
    }

    /**
     * Test the connection to the server.
     *
     * @param  string  $ip
     * @param  int  $port
     * @param  array  $data
     * @return bool
     */
    abstract public function verifyLink(string $ip, int $port, array $data = []);

    /**
     * Execute a command on the given server.
     *
     * @param  array  $commands
     * @param  string|null  $playerName
     */
    public function executeCommands(array $commands, ?string $playerName)
    {
        //
    }

    /**
     * Return if the server can execute commands.
     *
     * @return bool
     */
    abstract public function canExecuteCommand();
}
