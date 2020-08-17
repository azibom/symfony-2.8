<?php

namespace ModelBundle\DataFixtures\ORM;

use Blog\ModelBundle\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PostFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < Objects::POST_COUNT; $i++) {
            $post = new Post();
            $post->setBody('Body '.$i);
            $post->setTitle('Title '.$i);
            $post->setSlug('Slug '.$i);
            $post->setAuthor(Objects::getInstance(Objects::AUTHOR, $this));
            $manager->persist($post);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}