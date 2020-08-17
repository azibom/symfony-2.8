<?php

namespace ModelBundle\DataFixtures\ORM;

use Blog\ModelBundle\Entity\Author;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AuthorFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < Objects::AUTHOR_COUNT; $i++) {
            $author = new Author();
            $author->setName('Name '.$i);
            $manager->persist($author);
            $this->addReference(Objects::AUTHOR.$i, $author);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}