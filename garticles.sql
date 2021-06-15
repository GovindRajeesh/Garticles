-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2021 at 03:07 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `garticles`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `catId` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `body` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` text DEFAULT NULL,
  `slug` varchar(500) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `catId`, `title`, `body`, `date`, `image`, `slug`, `userId`) VALUES
(3, 13, 'Cell organelles', 'Cell organelles are special components of cell.\r\nThey do all works in the cell.\r\nEach cell organelle has their own specific function.\r\n\r\nHere are some of the cell organelles(Not all).\r\n\r\nPlasma Membrane:-\r\nThis organelle is the outermost covering of the cell that separates the contents of the cell from external environment and allows only exit and entry of some substances.Therefore it is known as selectively permeable membrane.Substances like carbon dioxide or oxygen can move across the cell through the process of diffusion.\r\n\r\nCell Wall:-\r\nThis organelle is only found in plant cells.It is a rigid outer covering which lies outside the plasma membrane.Cell wall is composed of cellulose,which is a complex substance and provides structural strength to plants.\r\n\r\nNucleus:-\r\nNucleus is also known as the brain of the cell.It has a double layered covering called nuclear membrane which has pores called nuclear pores which allow the transfer of materials from inside the nucleus to its outside.Nucleus contains chromosomes.\r\nChromosomes contain information for inheritance of features from parents to next generation in the form of DNA molecules.\r\n\r\nSearch google for more organelles given in the image.', '2021-06-14 08:22:30', 'https://rsscience.com/wp-content/uploads/2020/08/Cell-structure-and-organelles-1024x900.jpg', '210610190205', 1),
(5, 1, 'Indian Govt again warns WhatsApp to scrap its privacy policy.', 'Instant messaging platform WhatsApp may face legal action in India by May 25 if it does not send a satisfactory reply to a new notice sent by the Ministry of Electronics and Information Technology asking the company to withdraw its latest privacy policy update, ministry officials said.\r\n\r\n“We have a sovereign responsibility to protect the rights and interests of Indian citizens. The government will consider various options available under the law,” a senior IT ministry official said.In a communication sent late on Tuesday to WhatsApp asking it to withdraw the new privacy policy, the IT ministry said, “The changes to the privacy policy and the manner of introducing these changes including in FAQ (frequently asked questions) undermines the sacrosanct values of informational privacy, data security and user choice for Indian users and harms the rights and interests of Indian citizens.” The Indian Express has seen a copy of the new notice. Officials said that mere deferral by WhatsApp of the last date to accept the updated terms beyond its deadline of May 15 did not absolve it from respecting informational privacy, data security and user choice for Indian users.\r\n\r\nIn a statement, WhatsApp said it continued to engage with the Indian government and its update did not impact the privacy of personal messages for anyone. “No accounts were deleted on May 15 because of this update and no one in India lost functionality of WhatsApp either. We will follow up with reminders to people over the next several weeks,” a spokesperson said.\r\n\r\n-Thank you', '2021-06-14 12:25:23', 'https://cdn.vox-cdn.com/thumbor/RKo4ozBNmwYlPnGLo2EBE1lXTng=/0x0:2040x1360/920x613/filters:focal(857x517:1183x843):format(webp)/cdn.vox-cdn.com/uploads/chorus_image/image/68744940/acastro_210119_1777_whatsapp_0002.0.jpg', 'test3', 1),
(6, 11, 'Balancing carbon storage under elevated CO2.', 'A global synthesis of experiments reveals that increases in plant biomass under conditions of elevated CO2 mean that plants need to mine the soil for nutrients, which decreases soil’s ability to store carbon. In forests, elevated CO2 generally seems to greatly increase plant biomass, but not soil carbon. In grasslands, by contrast, it causes small changes in biomass and large increases in soil carbon.', '2021-06-14 08:22:41', NULL, 'Balanceofcarbonstorge', 4),
(1029, 11, 'Some of the biggest and important rivers in the world.', 'The River Nile is in Africa. It originates in Burundi, south of the equator, and flows northward through northeastern Africa, eventually flowing through Egypt and finally draining into the Mediterranean Sea.\r\nIt is the main source of water in two countries: Egypt and Sudan.\r\nThe Blue and the White Nile are the two tributaries of the river with the latter having a greater length than the former.\r\nThe source of the White Nile is not yet fully determined but is believed to be somewhere in Burundi or Rwanda. According to some reports, Lake Victoria is considered to be the source of the White Nile which is, in turn, fed by the Kagera River whose two major tributaries are the Ruvyironza and the Nyabarongo rivers of Burundi and Rwanda, respectively.\r\nThe Kagera is formed at the confluence of these two rivers near the Tanzania-Rwanda border.\r\nThe Blue Nile has a more defined origin in Lake Tana in Ethiopia. The two tributaries meet near the Sudanese capital of Khartoum.\r\nThe Nile River’s final course is through Egypt before it forms a delta and drains into the Mediterranean Sea.\r\nThe Nile basin is huge and includes parts of Tanzania, Burundi, Rwanda, Congo (Kinshasa), Kenya.\r\n \r\n\r\nAmazon River:\r\nThe Amazon River runs 4,000 miles from the Andes to the sea, and is the second longest river in the world.\r\nIt is also the largest in terms of the size of its watershed, the number of tributaries, and the volume of water discharged into the sea.\r\nThe headwaters of the Apurímac River were considered to be the origin of the Amazon River. However, a recent 2014 study claims that the origin of the Amazon can be traced to the Cordillera Rumi Cruz from where Peru’s Mantaro River originates.\r\nThis river then confluences with the Apurímac River (whose headwaters were earlier regarded as the source of the Amazon) and then other tributaries join the river downstream to form the Ucayali River which finally confluences with the Marañón River to form the main stem of the Amazon River.\r\n \r\n\r\nYangtze river:\r\n The Yangtze River is the world’s third longest river and the longest to flow entirely within one country.\r\nIt is also Asia’s longest river.\r\nThe river basin of the Yangtze houses one-third of the population of China.\r\nTwo origins of the Yangtze River have been suggested. Traditionally, the government of China recognizes the Tuotuo tributary located in the Tanggula Mountains as the source of the river.\r\nAccording to new data, however, the source of the Yangtze River is located in the Jari Hill from where the headwaters of the Dam Qu tributary originate. These tributaries and more join to form the mighty Yangtze River which finally drains into the East China Sea at Shanghai.\r\nThe Yangze River has over 700 tributaries but the principal tributaries are the Hun, Yalong, Jialing, Min, Tuo Jiang, and Wu Jiang.\r\n \r\n\r\nMississippi river:\r\nThe river system comprising of the Mississippi, Missouri, and Jefferson rivers, is regarded as the world’s fourth longest river system.\r\nThe Mississippi River begins in northern Minnesota where Lake Itasca is believed to be the origin of the river and drains into the Gulf of Mexico.\r\nWhen we regard the Jefferson River as the furthest source of the Mississippi River, then we get the Mississippi–Missouri–Jefferson river system.\r\n \r\n\r\n Yenisei river:\r\nThis is the world’s fifth-longest river system and the largest draining into the Arctic Ocean.\r\nThe source of the river is Mungaragiyn-Gol, which is located at the ridge of Dod-Taygasyn-Noor, Mongolia. The Selenge River is regarded as the headwaters of this river system. The Selenge River is 992 km long and drains into Lake Baikal.\r\nThe Angara River rises from Lake Baikal near Listvyanka and flows through the Irkutsk Oblast of Russia and finally joins the Yenisei River near Strelka.\r\nThe Yenisei finally drains into the Kara Sea, Arctic Ocean.', '2021-06-14 10:03:25', 'https://wildlifezones.com/wp-content/uploads/2019/09/Beautiful-River-in-India.jpg', 'importantrivers', 1),
(1033, 13, 'What Mutations of SARS-CoV-2 are Causing Concern?', 'As viruses are exposed to environmental selection pressures, they mutate and evolve, generating variants that may possess enhanced virulence. Some of the primary concerns that public health officials have as these new variants continue to emerge include their viral transmissibility, reinfection rates, disease severity, and vaccine effectiveness.\r\n\r\nHow do RNA viruses mutate?\r\nThe mutation rate of single-stranded ribonucleic acid (ssRNA) viruses is observed to be much higher than organisms that possess single-stranded deoxyribonucleic acid (ssDNA), and many times more than those with double-stranded DNA (dsDNA). Not all mutations necessarily increase virulence and, in the majority of cases, may in fact be deleterious or inconsequential.\r\n\r\nTherefore, organisms must find an equilibrium between a high mutation rate that allows them to adapt to changing environmental conditions, and a low one that lessens the incidence of catastrophic mutations. Small DNA viruses may encode their own DNA repair, and some RNA viruses also share the ability to check for and repair replication errors.\r\n\r\nHowever, while DNA viruses generally rely on the transcription machinery of the host cell, RNA viruses encode for their own transcription machinery. This means that the replication and mutation rate of RNA viruses is more directly related to their own genome and is thus subject to the same evolutionary pressures.\r\n\r\nVignuzzi &amp; Andino (2012) note that the offspring of RNA viruses, with genomes commonly falling into the size range of 7-12 kilobases (kb) in length, tend to bear one or two distinct mutations per nucleotide site. The severe acute respiratory syndrome coronavirus 2 (SARS-CoV-2) genome is thought to be around 27-31 kb in length, which increases the overall number of mutations acquired, without necessarily increasing the incidence rate.\r\n\r\nThe ability to rapidly acquire new genetic characteristics allows viruses to emerge in novel hosts, avoid vaccine-induced immunity, and become more virulent. Moreover, this ability can also be a double-edged sword in terms of improving overall genome fitness.\r\n\r\nWhat variants of concern have been found?\r\nB.1.1.7 lineage\r\nOne new strain with a particularly large number of mutations was first noted in the United Kingdom in September 2020, termed VOC 202012/01 (a variant of concern – December 2020), and is also known as 20B/501Y.V1by the United States Centers for Disease Control and Prevention (CDC). This strain, which has since been termed the B.1.1.7 variant, has a total of 23 mutations with 17 amino acid changes.\r\n\r\nSince its identification in Britain, the B.1.1.7 strain has been found in over 90 different countries around the world. In fact, as of April 7, 2021, the B.1.1.7 variant is the most common source of new SARS-CoV-2 infections in the United States.\r\n\r\nWhat is concerning about this specific strain is that it is thought to be 30-50% more infectious than the original SARS-CoV-2 strains and may be more deadly. However current vaccines still work on the strain.\r\n\r\nThe B.1.1.7 strain has the following key mutations:\r\n\r\nN501Y\r\nP681H\r\nH69-V70 and Y144/145 deletions\r\nSARS-CoV-2 interacts with ACE2 receptors in the body using its spike protein. This consists of two subunits, the first of which contains the receptor-binding domain. The B.1.1.7 lineage has a mutation on the receptor-binding domain, specifically with an asparagine amino acid being replaced with tyrosine at position 501, thus the mutation is termed N501Y.\r\n\r\nAdditionally, the strain often shows a deletion of amino acids 69 and 70, also seen to arise spontaneously in other strains, causing a conformational change of the spike protein.\r\n\r\nAt position 681, a mutation from a proline amino acid to histidine has also been found to arise spontaneously in several strains and is prominent in B.1.1.7, as is a mutation to open reading frame 8, the function of which is not yet fully understood.\r\n\r\nEvidence suggests that this strain is more transmissible, though it does not appear to lessen vaccine efficacy. Recent studies suggest this strain is more deadly, linked to a higher chance of hospitalization.\r\n\r\nB.1.351 lineage\r\nAnother strain, B.1.351 (also known as 20C/501Y.V2), also shares the N501Y mutation. This variant was first detected in South Africa in October of 2020 and has since been found in more than 48 other countries since then.\r\n\r\nThe B.1.351 strain has the following key mutations:\r\n\r\nN501Y\r\nK417N\r\nE484K\r\nThis South African variant is believed to be about 50% more transmissible as compared to previous variants that have been identified in South Africa. To date, the Pfizer-BioNTech vaccine has been found to be 75% effective against infection by this variant. Furthermore, vaccine effectiveness against severe, critical, or fatal disease due to SARS-CoV-2 infection with this variant, as well as the B.1.1.7 variant, has been found to be 97.4%.\r\n\r\nUnfortunately, the University of Oxford-AstraZeneca vaccine has been found to be less effective against the B.1.351 variant, which has led South Africa to suspend the national roll-out of this specific vaccine.\r\n\r\nP.1 lineage\r\nAnother strain of note, 20J/501Y.V3, was first described in Japan by the National Institute of Infectious Diseases, thought to have arrived in the country from Brazil on the 6th of January. The variant has been traced back to Manaus, Brazil.\r\n\r\nThe strain is not thought to be more deadly but is more transmissible than the original strain of SARS-CoV-2.\r\n\r\nThe P.1 strain has the following key mutations:\r\n\r\nN501Y\r\nK417T\r\nE484K\r\nThe P.1 lineage is a branch of the B.1.1.248 lineage and bears 12 mutations in the spike protein, including the previously mentioned N501Y and an exchange of glutamic acid with lysine at position 484 (E484K). It is a close relative of the B.1.351 strain.\r\n\r\nThe E484K mutation had previously been reported in a different lineage originating in Brazil as early as the summer of 2020 (B.1.1.28).\r\n\r\nClinical trial data using the Moderna mRNA vaccine has found that a single booster shot of this vaccine successfully increased neutralizing titers against the virus and the B.1.351 and P.1 variants in individuals who were previously vaccinated. Notably, this booster shot involved the use of the mRNA-1273.351 vaccine, which is a strain-matched vaccine that has been derived from the original Moderna mRNA vaccine denoted as mRNA-1273.\r\n\r\nB.1.427/B.1.429 lineage CAL.20C variant\r\nThe CAL.20C variant which spans the B.1.427 and B.1.429 lineages is believed to have emerged in California in May of 2020. Both of these variants are believed to be 20% more infectious than preexisting variant strains although do not seem to be spreading as fast as some variants like the B.1.1.7.\r\n\r\nThe B.1.427/B.1.429 variants have now been detected in North America, Europe, Asia, and Australia. Researchers have found that neutralizing antibodies obtained from people who had previously received either the Moderna or Novavax vaccinations were slightly less effective against these variants but still generated effective protection. Although the Pfizer vaccine was not studied in this paper, researchers believe that since it uses similar technology to that which is incorporated into the Moderna vaccine, that it would likely have a similar response.\r\n\r\nThis strain has the following key mutations:\r\n\r\nL452R\r\nB.1.525 and B1.526 lineages\r\nIn December of 2020, the B.1.525 variant was first found to be spreading throughout New York City. Like the B.1.1.7 lineage of SARS-CoV-2 variants, the B.1.525 variant also appears to have the same E484K mutation and the H69-V70 deletion. In addition to these mutations, the B.1.525 variant lineage also carries the Q677H mutation.\r\n\r\nIn addition to the B.1.525 lineage, the B.1.526 lineage of variants has also been identified in New York City. Notably, the B.1.526 lineage appears in two forms; one with the E484K spike mutation, whereas the other form of this variant has the S477N mutation.\r\n\r\nIt appears that neutralizing antibodies from both the convalescent plasma of patients who have recovered from COVID-19, as well as those which are produced post-vaccination are less effective against these two variants; however, further work must be conducted to confirm this observation.\r\n\r\nB.1.617 lineage\r\nThe B.1.617 strain has been dubbed the “double mutant virus” due to two of the concerning mutations it carries. These two key mutations are:\r\n\r\nE484Q\r\nL452R\r\nThe rapid rate at which this variant has spread across India indicates to some scientists that this variant is highly transmissible. This observation is largely due to the fact that the B.1.617 variant appears to have a greater prevalence as compared to the other variants that have been detected in India, such as the B.1.618 variant that was originally present in West Bengal.\r\n\r\nAs the B.1.617 variant continues to spread at an alarming rate in India, three different subtypes of this variant have been identified which include B.1.617.1, B.1.617.2, and the B.1.617.3 variants. As compared to the first subtype of this variant, data suggests that the B.1.617.2 variant has a growth rate advantage that has allowed for it to become the dominant subtype found in much of India.\r\n\r\nTo date, it is not yet fully understood what makes the B.1.617.2 variant so transmissible and whether current vaccines can offer protection against this variant. However, one study produced by a team of researchers at the University of Cambridge found that the neutralizing antibodies generated by individuals who were previously vaccinated with one dose of the Pfizer vaccine are about 80% less potent against some B.1.617 mutants.\r\n\r\nFurthermore, a team of German researchers also found that neutralizing antibodies collected from patients who were previously infected by SARS-CoV-2 were 50% less effective at neutralizing these circulating strains. It should be noted, however, that this data does not necessarily indicate that the vaccines are ineffective against these variants.\r\n\r\nMutations of concern\r\nThe apparent spontaneity of the development of some of the key mutations that have been discussed here suggests that the virus could be experiencing convergent selection pressures around the globe, with the most transmissible forms outcompeting their cousins.\r\n\r\nThe current mutations of concern that may be aiding the spread of coronavirus include:\r\n\r\nD614G\r\nThe D614G mutation is of B.1 lineage and appeared in early 2020. This mutation quickly spread across the world and became dominant.  \r\n\r\nThe D614G mutation is a missense mutation in which an altered single DNA base pair causes the substitution of aspartic acid (single-letter code: D) with glycine (single-letter code: G) in the protein that the mutated gene encodes.\r\n\r\nN501Y\r\nThis mutation is present in several lineages including B.1.345, B.1.17, and P.1. This mutation changes the amino acid asparagine (N) to tyrosine (Y) at position 501 in the receptor-binding domain of the virus’ spike protein, which may aid the virus in a bind to cells more tightly.\r\n\r\nE484K or “Eek”\r\nThis spike protein mutation has been found in several lineages and may aid the virus in avoiding some antibody types. In it, there is an exchange of glutamic acid with lysine at position 484.\r\n\r\nE484Q\r\nThis spike protein mutation is also mutated at position 484, with the exception that the glutamic acid is substituted with glutamine. This mutation is thought to increase immune evasion and ACE2 binding.\r\n\r\nK417\r\nThis spike protein mutation has been found in several lineages, including P.1 and B.1.351. It is also thought to help the virus bind to cells more tightly.\r\n\r\nThis mutation is K417N in the B.1.351 strain, and K417T in the P.1 strain\r\n\r\nL452R\r\nThe L452R spike protein mutation has appeared in several lineages. In this mutation, there is a leucine to arginine substitution at amino acid 452. The mutation is thought to increase immune evasion and ACE2 binding.\r\n\r\nThis mutation was observed in both the U.S. and Europe in 2020, before increasing in prevalence in January 2021, as it is notably present in the CAL.20C variant that has become widespread in California, particularly in Los Angeles. It is also notably present in the B.1.617 variant.\r\n\r\nNotably, laboratory studies have found that specific monoclonal antibody treatments may not be as effective in treating COVID-19 caused by variants with the L452R or E484K mutations.\r\n\r\nQ677\r\nThe Q677 mutation is located on the side of the SARS-CoV-2 spike protein, thereby suggesting that it may play a role in increasing the penetrability of the virus into human cells. To date, the Q777 mutation has been identified in several different SARS-CoV-2 variant lineages, seven of which have been identified in the United States. The Q677 variant has not yet been determined to be more infectious as compared to preexisting mutations.\r\n\r\nWhat causes a virus to change and how to stop stronger Covid-19 variants from emerging\r\nWhich regions of the SARS-CoV-2 genome mutate the most?\r\n\r\nA large meta-study performed by Koyama, Platt &amp; Parida (2020) gathered over 10,000 SARS-CoV-2 genomes worldwide and compared them to detect the most common mutations, identifying nearly 6,000 distinct variants.\r\n\r\nThe most divergent genome segment was ORF1ab, which is the largest by far as it occupies around a third of the genome. ORF1ab is transcribed into a multiprotein complex that is eventually cleaved into a number of nonstructural proteins that are involved in transcription. Some of these proteins are the target of anti-viral drugs remdesivir and favipiravir, which may be a cause for concern regarding the development of a strain against which these drugs have no effect.\r\n\r\nThe second most diverse region of the SARS-CoV-2 genome is around the spike protein, which must remain largely conserved in order to interact with ACE2. Some mutations, such as D364Y, have been reported to enhance the structural stability of the spike protein, increasing its affinity for the receptor. However, most are likely to lessen the virulence of the virus to such an extent that the lineage quickly dies off.', '2021-06-14 10:19:40', 'https://d2jx2rerrg6sh3.cloudfront.net/image-handler/ts/20210517052723/ri/673/picture/2021/5/shutterstock_1654083868.jpg', 'Concernofsarscov2', 1),
(1039, 4, 'Battle of panipat.', 'The Third Battle of Panipat took place on 14 January 1761 at Panipat, about 97 km (60 miles) north of Delhi, between the Maratha Empire and the invading Afghan army (of Ahmad Shah Durrani), supported by four Indian allies, the Rohillas under the command of Najib-ud-daulah, Afghans of the Doab region, and the Nawab of Awadh, Shuja-ud-Daula. The Maratha army was led by Sadashivrao Bhau who was third in authority after the Chhatrapati (Maratha King) and the Peshwa (Maratha Prime Minister). The main Maratha army was stationed in Deccan with the Peshwa.\r\n\r\nMilitarily, the battle pitted the artillery and cavalry of the Marathas against the heavy cavalry and mounted artillery (zamburak and jezail) of the Afghans and Rohillas led by Abdali and Najib-ud-Daulah, both ethnic Afghans. The battle is considered one of the largest and most eventful fought in the 18th century,[10] and it has perhaps the largest number of fatalities in a single day reported in a classic formation battle between two armies.', '2021-06-14 12:04:43', 'https://upload.wikimedia.org/wikipedia/commons/3/37/The_Third_battle_of_Panipat_13_January_1761.jpg', '210610122931', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `slug` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`) VALUES
(1, 'Technology', 'Technology'),
(2, 'Sports', 'Sports'),
(3, 'Entertainment', 'Entertainment'),
(4, 'History', 'History'),
(5, 'Politics', 'Politics'),
(6, 'Art', 'Art'),
(7, 'Finance and economics', 'Financeandeconomics'),
(8, 'Current Affairs', 'CurrentAffairs'),
(9, 'Health', 'Health'),
(10, 'Food', 'Food'),
(11, 'Nature', 'Nature'),
(12, 'Crime', 'Crime'),
(13, 'Science', 'sci'),
(14, 'Garticles', 'thissites');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'govindrajeesh', '$2y$10$FmeHYcamk/2WmtH/nY7ndORwHZf/LqX5K15U3U93tAfex0SXf3APG'),
(4, 'sample', '$2y$10$O7NXIyTnSacqdZ7ePxiHDeS5Us/EcFfatzZJcaVDpaDGwe1VWluxy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catId` (`catId`),
  ADD KEY `userId` (`userId`);
ALTER TABLE `articles` ADD FULLTEXT KEY `title` (`title`,`body`,`slug`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1041;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`catId`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
