<?php

namespace App\DataFixtures;

use App\Entity\Admin\Conference;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppConferences extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $conference = new Conference();
        $conference->setTitle('Conférence numéro 1');
        $conference->setImage('image1.jpg');
        $conference->setContent("<p>Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des pas.</p>");
        $manager->persist($conference);

        $conference2 = new Conference();
        $conference2->setTitle("Conférence d'été");
        $conference2->setImage('image2.jpg');
        $conference2->setContent("<p>Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des pas.</p>");
        $manager->persist($conference2);

        $conference3 = new Conference();
        $conference3->setTitle('Rezé : Comment sentir son pouls');
        $conference3->setImage('image6.jpg');
        $conference3->setContent("<p>Pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des pas.</p>");
        $manager->persist($conference3);

        $conference4 = new Conference();
        $conference4->setTitle('Vivre après la mort');
        $conference4->setImage('image7.jpg');
        $conference4->setContent("<p>Adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des pas.</p>");
        $manager->persist($conference4);

        $manager->flush();
    }
}
