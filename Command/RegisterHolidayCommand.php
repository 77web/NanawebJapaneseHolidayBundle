<?php

namespace Nanaweb\JapaneseHolidayBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class RegisterHolidayCommand extends ContainerAwareCommand
{
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $year = $input->getOption('year');
        if (!$year) {
            $now = new \DateTime();
            $year = $now->format('Y');
        }

        $em = $this->getContainer()->get('doctrine')->getManager();
        $calculator = $this->getContainer()->get('nanaweb_japanese_holiday.holidays');
        foreach ($calculator->getHolidaysForYear($year) as $date => $name) {

            $entity = $this->generateHolidayEntity($date, $name);
            $em->persist($entity);
        }

        $em->flush();
    }

    abstract protected function generateHolidayEntity($date, $name);
}

