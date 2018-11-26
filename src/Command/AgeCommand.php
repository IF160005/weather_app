<?php
/**
 * Created by PhpStorm.
 * User: sigita
 * Date: 18.11.26
 * Time: 18.28
 */

namespace App\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class AgeCommand extends ContainerAwareCommand
{

    public function __construct($name = null)
    {
        parent::__construct($name);
    }

    protected function configure()
    {

        $this
            ->setName('app:age:calculator')
            ->setDescription('Creates a new user.')
            ->setHelp('This command allows you to create a user...')
            ->addArgument('birthdayDate', InputArgument::REQUIRED, 'User age')
            ->addOption('adult', 'a', InputOption::VALUE_NONE, 'Am I an adult ');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $style = new SymfonyStyle($input, $output);
        $birthDate = $input->getArgument("birthdayDate");
        $io = $this->getContainer()->get("app.age.manager");
        $age = $io->getAge(new \DateTime($birthDate));
        $style->note(sprintf("I am %s years old", $age));
        if ($input->getOption("adult")) {
            if ($io->isAdult($age)) {
                $style->success("Am I an adult? --- YES!!");
            } else {
                $style->error("Am I an adult? --NO!!!");
            }
        }
    }

}