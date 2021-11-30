<?php

namespace App\DatabasesBasics\Controllers;

use App\DatabasesBasics\Entities\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Pagination\Paginator;

class MainController
{
    public function __construct(private EntityManager $entityManager, private string $baseUrl)
    {
    }

    public function show($name = false)
    {
        $sortRule = $_SESSION['sort'] ?? false;

        $query = $this->entityManager
            ->getRepository(User::class)
            ->createQueryBuilder('user');

        if ($name) {
            $query->andWhere('user.firstName = :name')
                ->setParameter('name', $name);
        }

        if ($sortRule) {
            $query->orderBy('user.'.$sortRule, 'ASC');
        }

        $paginator = new Paginator($query->getQuery());

        $currentPage = $_SESSION['page'] ?? 1;
        $maxPerPage = 15;
        $firstItem = $currentPage == 1 ? 0 : $maxPerPage * ($currentPage - 1);
        $numberOfItems = count($paginator);
        $numberOfPages = ceil($numberOfItems / $maxPerPage);

        $users = $paginator->getQuery()->setFirstResult($firstItem)->setMaxResults($maxPerPage)->getResult();

        $this->buildPage(
            $this->buildUsersData($users),
            $this->buildPagination($numberOfPages, $currentPage, $sortRule)
        );
    }

    public function create($request)
    {
        $user = new User();
        $this->saveUser($user, $request);
    }

    public function update($request)
    {
        $user = $this->entityManager->getRepository(User::class)->findOneBy(['id' => $request['id']]);
        $this->saveUser($user, $request);
    }

    public function delete($id)
    {
        $user = $this->entityManager->getRepository(User::class)->findOneBy(['id' => $id]);

        $this->entityManager->remove($user);

        $this->entityManager->flush();

        header('Location: '.$this->baseUrl);
    }

    private function saveUser($user, $request)
    {
        $user->setFirstName($request['firstName'])
            ->setLastName($request['lastName'])
            ->setEmail($request['email'])
            ->setPhone($request['phone']);

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $this->show();
    }

    private function buildUsersData(array $users): string
    {
        $usersData = '';

        foreach ($users as $user) {
            $id = $user->getId();
            $firstName = $user->getFirstName();
            $lastName = $user->getLastName();
            $email = $user->getEmail();
            $phone = $user->getPhone();
            $baseUrl = $this->baseUrl;

            $usersData .= "<form method='post' id=\"item-{$id}\" class=\"item\">
                                <input type='hidden' class='data' name='id' value='{$id}'>
                                <input class='data' name='firstName' value='{$firstName}'>
                                <input class='data' name='lastName' value='{$lastName}'>
                                <input class='data' name='email' value='{$email}'>
                                <input class='data' name='phone' value='{$phone}'>
                                <div class='data'>
                                    <input class='btn update' type='submit' value='Update'>
                                    <a class='btn remove' href='{$baseUrl}?remove={$id}' type='submit'>Remove</a>
                                </div>
                            </form>";
        }

        return $usersData;
    }

    private function buildPagination(int $numberOfPages, int $currentPage, $sortRule): string
    {
        $pages = '';
        $baseUrl = $this->baseUrl;
        $sort = $sortRule ? '&sort='.$sortRule : '';

        foreach (range(1, $numberOfPages) as $page) {
            $activeClass = $page == $currentPage ? 'active' : '';
            $pages .= "<a class='{$activeClass}' href=\"{$baseUrl}?page={$page}{$sort}\">$page</a>";
        }

        return $pages;
    }

    private function buildPage($users, $pages)
    {
        $template = file_get_contents('Views/Main.html');
        echo str_replace(
            ['{USERS}', '{PAGES}', '{BASE_URL}', '{QUERY_PARAMS}'],
            [$users, $pages, $this->baseUrl, '?page='.$_SESSION['page'].'&sort='],
            $template
        );
    }
}
