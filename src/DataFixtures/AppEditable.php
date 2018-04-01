<?php

namespace App\DataFixtures;

use App\Entity\Admin\Editable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppEditable extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $editable1 = new Editable();
        $editable1->setAccessKey('preventive.intro');
        $editable1->setContent("Généralement, on utilise un texte en faux latin (le texte ne veut rien dire, il a été modifié), le Lorem ipsum ou Lipsum, qui permet donc de faire office de texte d'attente.");
        $manager->persist($editable1);
        $editable2 = new Editable();
        $editable2->setAccessKey('complementary.intro');
        $editable2->setContent("L'avantage de le mettre en latin est que l'opérateur sait au premier coup d'œil que la page contenant ces lignes n'est pas valide, et surtout l'attention du client n'est pas dérangée par le contenu, lui permettant de demeurer concentré sur le seul aspect graphique.");
        $manager->persist($editable2);


        $editable3 = new Editable();
        $editable3->setAccessKey('preventive.title');
        $editable3->setContent("Lorem preventive title");
        $manager->persist($editable3);

        $editable4 = new Editable();
        $editable4->setAccessKey('complementary.title');
        $editable4->setContent("Loreme ipsum complementary title ");
        $manager->persist($editable4);

        $editable5 = new Editable();
        $editable5->setAccessKey('about.title');
        $editable5->setContent("Francois Chamard Bois");
        $manager->persist($editable5);

        $editable6 = new Editable();
        $editable6->setAccessKey('about.description');
        $editable6->setContent("Lorem Khaled Ipsum is a major key to success. Bless up. The weather is amazing, walk with me through the pathway of more success. Take this journey with me, Lion! Let me be clear, you have to make it through the jungle to make it to paradise, that’s the key, Lion! Wraith talk. They key is to have every key, the key to open every door. Put it this way, it took me twenty five years to get these plants, twenty five years of blood sweat and tears, and I’m never giving up, I’m just getting started.");
        $manager->persist($editable6);

        $manager->flush();
    }
}
