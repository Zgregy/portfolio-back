<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

use App\Entity\{Education, Skills, SocialsNetworks, User, Works};

class AppFixtures extends Fixture
{
    public function __construct (private UserPasswordHasherInterface $hasher) {}

    public function load(ObjectManager $manager): void
    {

        $user = new User();
        $user->setEmail('greg.dilon@gmail.com')
            ->setName('Greg')
            ->setLastname('DILON')
            ->setPresentation('Ouai c\'est greg')
            ->setPhone('0667888121')
            ->setAddress('2 allées des écoles')
            ->setCity('Épron')
            ->setZipcode(14610)
            ->setPassword($this->hasher->HashPassword($user, 'ixU9vrv6ujb&8G'))
            ->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);
        
        $dataSkills = json_decode('
            [
                {
                    "techno_name": "HTML",
                    "description": "Utilisé dans pratiquement tous les projets qui nécessitent une interface web.",
                    "proficiency_level": "Élevé"
                },
                {
                    "techno_name": "CSS",
                    "description": "Utilisé dans pratiquement tous les projets qui nécessitent une interface web.",
                    "proficiency_level": "Élevé"
                },
                {
                    "techno_name": "JavaScript",
                    "description": "Utilisé pour la manipulation du Document Object Model (DOM) et pour créer des interactions dynamiques sur les pages web.",
                    "proficiency_level": "Élevé"
                },
                {
                    "techno_name": "PHP",
                    "description": "Utilisé pour le développement de scripts côté serveur et la création de pages web dynamiques.",
                    "proficiency_level": "Élevé"
                },
                {
                    "techno_name": "Sass",
                    "description": "Sert à améliorer la syntaxe du CSS de base et facilite l\'écriture de styles réutilisables et la gestion de styles complexes.",
                    "proficiency_level": "Élevé"
                },
                {
                    "techno_name": "Tailwind",
                    "description": "Tailwind est un framework CSS incroyable qui facilite la création rapide et flexible d\'interfaces utilisateur avec des classes CSS prédéfinies.",
                    "proficiency_level": "Élevé"
                },
                {
                    "techno_name": "NodeJS",
                    "description": "Utilisé fréquemment pour développer des API REST et GraphQL.",
                    "proficiency_level": "Élevé"
                },
                {
                    "techno_name": "MongoDB",
                    "description": "Utilisé pour travailler avec des bases de données non relationnelles. Permet de stocker des données de manière flexible et scalable.",
                    "proficiency_level": "Moyen"
                },
                {
                    "techno_name": "SQL",
                    "description": "Utilisé pour gérer et manipuler des bases de données relationnelles. Permet d\'interroger et de récupérer des données de manière efficace.",
                    "proficiency_level": "Élevé"
                },
                {
                    "techno_name": "Python",
                    "description": "Utilisé pour une variété de tâches de programmation, allant de l\'analyse de données à la création de scripts pour automatiser des tâches.",
                    "proficiency_level": "Moyen"
                },
                {
                    "techno_name": "Symfony",
                    "description": "Utilisé pour développer des applications web en PHP. Favorise une architecture modulaire et offre de nombreux outils pour accélérer le développement.",
                    "proficiency_level": "Moyen"
                },
                {
                    "techno_name": "Wordpress",
                    "description": "CMS principal de mon entreprise actuelle. Il permet de créer des sites web et des blogs. Permet de gérer facilement le contenu et offre une grande flexibilité grâce à son système de plugins.",
                    "proficiency_level": "Élevé"
                },
                {
                    "techno_name": "Flutter",
                    "description": "Utilisé pour développer des applications mobiles pour Android et iOS. Permet de créer des applications performantes avec une seule base de code.",
                    "proficiency_level": "Moyen"
                },
                {
                    "techno_name": "Unreal Engine",
                    "description": "Utilisé uniquement de manière personnelle et pour le divertissement. Offre des outils puissants pour la création d\'environnements 3D et la programmation de la logique du jeu.",
                    "proficiency_level": "Basse"
                }
            ]
        ');
        
        foreach ($dataSkills as $skillData) {
            $skill = new Skills();
            $skill->setName($skillData->techno_name)
                ->setDescription($skillData->description)
                ->setProficiencyLevel($skillData->proficiency_level)
                ->setIconUrl('test');
            $manager->persist($skill);
        }
        
        $dataEductions = json_decode('
            [
                {
                    "school_name" : "My Digital School",
                    "location" : "Saint contest",
                    "period" : "2021-2023",
                    "degree" : "Master",
                    "study_level" : "BAC+5",
                    "spec" : "Consultant en management de projet option développeur full-stack"
                },
                {
                    "school_name" : "My Digital School",
                    "location" : "Saint contest",
                    "period" : "2020-2021",
                    "degree" : "Bachelor",
                    "study_level" : "BAC+3",
                    "spec" : "Développeur WEB et mobile"
                },
                {
                    "school_name" : "AIFCC (ADEN)",
                    "location" : "Caen",
                    "period" : "2017-2019",
                    "degree" : "BTS sio",
                    "study_level" : "BAC+2",
                    "spec" : "Solution logiciel et applications métiers"
                }
            ]
        ');
        
        foreach ($dataEductions as $educationData) {
            $education = new Education();
            $education->setName($educationData->school_name)
                ->setDegree($educationData->degree)
                ->setInstitution($educationData->school_name)
                ->setPeriod($educationData->period)
                ->setCity($educationData->location)
                ->setDiploma($educationData->study_level)
                ->setSpecification($educationData->spec);
            $manager->persist($education);
        }

        $dataWorks = json_decode('
            [
                {
                    "project_name" : "L\'atelier de Roussypo",
                    "company" : "Roussypo",
                    "projectType" : "Site vitrine sous Wordpress",
                    "description" : "Réalisation du site vitrine dans le domaine du flocage de vêtements",
                    "techno" : "Wordpress, PHP, MySQL, Javascript, HTML, CSS, SASS",
                    "link" : "N/A"
                },
                {
                    "project_name" : "Divers",
                    "company" : "HighFive",
                    "projectType" : "Site vitrine sous Wordpress",
                    "description" : "Réalisation de sites internet vitrine / boutique et maintenant de sites existant",
                    "techno" : "Wordpress, PHP, MySQL, Javascript, HTML, CSS, SASS",
                    "link" : "N/A"
                },
                {
                    "project_name" : "La Semeuse de Pierres",
                    "company" : "La Semeuse de Pierres",
                    "projectType" : "Site vitrine sous Wordpress",
                    "description" : "Site wordpress pour la société La semeuse de pierre afin de répertorier les pierres en lithothérapie",
                    "techno" : "Wordpress, PHP, MySQL, Javascript, HTML, CSS, SASS",
                    "link" : "https://www.lasemeusedepierres.com/"
                },
                {
                    "project_name" : "La Semeuse de Pierres API",
                    "company" : "La Semeuse de Pierres / My Digital Schcool",
                    "projectType" : "API REST",
                    "description" : "Élaboration d\'une API REST pour interconnecter l\'outil Hiboutik et wordpress.",
                    "techno" : "NodeJS, MongoDB",
                    "link" : "N/A"
                }
            ]
        ');

        foreach ($dataWorks as $workData) {
            $work = new Works();
            $work->setName($workData->project_name)
                ->setCompany($workData->company)
                ->setDescription($workData->description)
                ->setLink($workData->link)
                ->setProjectType($workData->projectType);
            $manager->persist($work);
        }

        $dataSocialsNetworks = json_decode('
            [
                {
                    "name" : "LinkedIn",
                    "link" : "https://www.linkedin.com/in/greg-dilon-41735713a"
                }
            ]
        ');

        foreach ($dataSocialsNetworks as $SocialData) {
            $social = new SocialsNetworks();
            $social->setName($SocialData->name)
                ->setLink($SocialData->link)
                ->setIconUrl('test');
            $manager->persist($social);
        }

        $manager->flush();
    }
}
