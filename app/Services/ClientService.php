<?php
namespace delivery\Services;

use delivery\Repositories\ClientRepository;
use delivery\Repositories\UserRepository;

/**
*Serviço/Regra de negócios com foco nos Clientes
*/
class ClientService
{
    private $clientRepository;
    private $userRepository;

    public function __construct(ClientRepository $clientRepository,
                                UserRepository $userRepository)
    {

        $this->clientRepository = $clientRepository;
        $this->userRepository = $userRepository;

    }
    public function update(array $data, $id)
    {
        $this->clientRepository->update($data, $id);

        //Pegando o ID do usuário através do repository
        $userId = $this->clientRepository->find($id, ['user_id'])->user_id;
        //Atualizar dados do Usuário
        $this->userRepository->update($data['user'], $userId);
    }

    public function create(array $data)
    {
      //Atribuição da senha no array do User
        $data['user']['password'] = bcrypt(123456);
      //Criando o Usuário
        $user = $this->userRepository->create($data['user']);

        // Adicionando o user_id no array principal para quando o client for criado
        //ele sera passado
        $data['user_id'] = $user->id; // Recebe ID do Usuário

        $this->clientRepository->create($data);
    }
}
