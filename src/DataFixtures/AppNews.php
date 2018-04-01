<?php

namespace App\DataFixtures;

use App\Entity\Admin\News;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppNews extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=1; $i < 4; $i++) {
            $news1 = new News();
            $news1->setTitle('Praesent et libero convallis, sollicitudin purus at, accumsan turpis'.$i);
            $news1->setImage('image'.$i.'.jpg');
            $news1->setBigImage('image'.$i.'.jpg');
            $news1->setText('<p>Praesent et libero convallis, sollicitudin purus at, accumsan turpis. Integer lobortis magna id malesuada imperdiet. Vestibulum posuere consectetur ante at venenatis. Aenean egestas sagittis sollicitudin. Mauris mollis ex mi, non elementum ex condimentum nec. Mauris lacinia augue lacus, sed elementum metus molestie eget. Sed vel rutrum ante. Integer accumsan quis magna in maximus. Cras aliquam purus sit amet ligula viverra, sit amet dictum quam aliquam. Aenean eget odio vulputate, interdum tortor vel, finibus neque. Aenean posuere venenatis sodales. Nullam vitae iaculis nisi. Aliquam at risus at dolor imperdiet tempus nec ac nisl.

            Curabitur ac arcu at nisi tempus pharetra eget vitae ante. Curabitur lobortis sapien leo, non interdum metus sodales ac. Praesent ac venenatis purus. Sed facilisis luctus dolor sit amet maximus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quis turpis commodo diam congue mattis ac eu dui. Nunc eget fermentum nibh. Mauris pretium et turpis quis lacinia. In vehicula maximus orci, vel consectetur leo. Cras vitae auctor felis. Cras placerat leo non pulvinar lobortis. Donec sed facilisis mauris. Maecenas blandit porttitor auctor. Cras non egestas nibh.</p>');
            $manager->persist($news1);
        }

        $manager->flush();
    }
}
