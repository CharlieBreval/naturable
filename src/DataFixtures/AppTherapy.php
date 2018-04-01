<?php

namespace App\DataFixtures;

use App\Entity\Admin\Therapy;
use App\Entity\Admin\TherapyContent;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppTherapy extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $content2 = new TherapyContent();
        $content2->setTopTitle("Concernant la pratique du jeûne sous encadrement médical");
        $content2->setTitle("Le jeûne à visée préventive ou thérapeutique");
        $content2->setText("<p>Si la pratique du jeûne encadré au sein d’une structure médicalisée semble globalement peu dangereuse, des risques sérieux existent si cette pratique a lieu en dehors d’une structure médicalisée.
Le jeûne, outre la sensation de faim, peut provoquer des maux de tête importants, des étourdissements, voire
des malaises. Au-delà de deux semaines, il peut provoquer des anémies par carence en fer, des inflammations
et fibroses au niveau hépatique et une dégradation du capital osseux.</p>");
        $content2->setImage("image3.jpg");
        $manager->persist($content2);

        $content1 = new TherapyContent();
        $content1->setTopTitle("Selon le Rapport Flajolet ,");
        $content1->setTitle("La prévention selon l’Organisation Mondiale de la Santé (OMS)");
        $content1->setText("<p>Gestion active et responsabilisée par la personne de son capital santé dans tous les aspects de la vie. L’action de promotion de la santé, de prévention des maladies ou d'éducation thérapeutique est déclenchée par ou des professionnels. Une participation active de la personne ou du groupe ciblé est systématiquement recherchée.</p>");
        $content1->setImage("image2.jpg");
        $manager->persist($content1);


        $content3 = new TherapyContent();
        $content3->setTopTitle("Concernant la pratique du jeûne sous encadrement médical");
        $content3->setTitle("Le jeûne à visée préventive ou thérapeutique");
        $content3->setText("<p>Si la pratique du jeûne encadré au sein d’une structure médicalisée semble globalement peu dangereuse, des risques sérieux existent si cette pratique a lieu en dehors d’une structure médicalisée.
Le jeûne, outre la sensation de faim, peut provoquer des maux de tête importants, des étourdissements, voire
des malaises. Au-delà de deux semaines, il peut provoquer des anémies par carence en fer, des inflammations
et fibroses au niveau hépatique et une dégradation du capital osseux.</p>");
        $content3->setImage("image3.jpg");
        $manager->persist($content3);

        $content4 = new TherapyContent();
        $content4->setTopTitle("Selon le Rapport Flajolet ,");
        $content4->setTitle("La prévention selon l’Organisation Mondiale de la Santé (OMS)");
        $content4->setText("<p>Gestion active et responsabilisée par la personne de son capital santé dans tous les aspects de la vie. L’action de promotion de la santé, de prévention des maladies ou d'éducation thérapeutique est déclenchée par ou des professionnels. Une participation active de la personne ou du groupe ciblé est systématiquement recherchée.</p>");
        $content4->setImage("image2.jpg");
        $manager->persist($content4);

        $therapy1 = new Therapy();
        $therapy1->setCategory('preventive');
        $therapy1->setTitle('Prévention de la fatigue');
        $therapy1->setSubtitle("<p>La notion de prévention décrit l'ensemble des actions, des attitudes et comportements qui tendent à éviter la survenue de maladies ou de traumatismes ou à maintenir et à améliorer la santé.");
        $therapy1->setImage('image1.jpg');
        $therapy1->setBanner('image11.jpg');

        $therapy2 = new Therapy();
        $therapy2->setCategory('preventive');
        $therapy2->setTitle('Prévention des hypnoses');
        $therapy2->setSubtitle("De la santé, de prévention des maladies ou d'éducation thérapeutique est déclenchée par ou des professionnels.");
        $therapy2->setImage('image6.jpg');
        $therapy2->setBanner('image10.jpg');

        $manager->persist($therapy1);
        $manager->persist($therapy2);
        $content1->setTherapy($therapy1);
        $content2->setTherapy($therapy1);
        $content3->setTherapy($therapy2);
        $content4->setTherapy($therapy2);

        $manager->flush();
    }
}
