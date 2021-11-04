<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExerciseController extends AbstractController
{
    /**
     * @Route("/exercise", name="exercise")
     */
    public function index(): Response
    {
        // 1 - Cria um array
        $arr = [];

        // 2 - Popule esse array com 7 números
        $arr = range(1, 100);
        shuffle($arr);
        $arr = array_slice($arr, 0, 7);
        
        // 3 - Imprima o número da terceira posição do array
        print $arr[2];

        // 4 - Crie uma variável com todos os itens do array no formato de string separado por vírgula
        $implode = implode(',', $arr);

        // 5 - Crie um novo array a partir da variável no formato de string que foi criada e destrua o array anterior
        $explode = explode(',', $implode);
        unset($arr);

        // 6 - Crie uma condição para verificar se existe o valor 14 no array
        if (in_array(14, $explode)) {
            print ' - Tem o valor 14';
        } else {
            print ' - Não tem o valor 14';
        }

        // 7 - Faça uma busca em cada posição. Se o número da posição atual for menor que o da posição anterior 
        // (valor anterior que não foi excluído do array ainda), exclua esta posição
        $itemsRemove = [];
        foreach ($explode as $key => $item) {
            if ($key > 0 && $item < $explode[$key - 1]) {
                $itemsRemove[] = $item;
            }
        }

        $explode = array_diff($explode, $itemsRemove); 

        // 8 - Remova a última posição deste array
        array_pop($explode);

        // 9 - Conte quantos elementos tem neste array
        count($explode);

        // 10 - Inverta as posições deste array
        $explode = array_reverse($explode);

        die('Fim');
    }
}
