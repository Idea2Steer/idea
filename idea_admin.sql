-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2022 at 05:39 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idea_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `ida_city`
--

CREATE TABLE `ida_city` (
  `city_id` int(8) NOT NULL,
  `state_id` tinyint(2) NOT NULL,
  `city_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ida_city`
--

INSERT INTO `ida_city` (`city_id`, `state_id`, `city_name`) VALUES
(1, 1, 'Bhopal'),
(2, 1, 'Gwalior'),
(3, 1, 'Indore'),
(4, 1, 'Jabalpur'),
(5, 1, 'Sagar'),
(6, 1, 'Satna'),
(7, 1, 'Ujjain'),
(8, 2, 'Bhilai'),
(9, 2, 'Bilaspur'),
(10, 2, 'Raipur'),
(11, 10, 'BENGALURU\r\n'),
(12, 15, 'Hyderabad'),
(13, 33, 'Anantapur'),
(14, 33, 'Bhimavaram'),
(15, 33, 'Chirala'),
(16, 33, 'Chittoor'),
(17, 33, 'Guntur'),
(18, 33, 'Kadapa'),
(19, 33, 'Kakinada'),
(20, 15, 'Karimnagar'),
(21, 15, 'Khammam'),
(22, 33, 'Kurnool'),
(23, 33, 'Nellore'),
(24, 33, 'Ongole'),
(25, 33, 'Peddapuram'),
(26, 33, 'Rajahmundry'),
(27, 33, 'Srikakulam'),
(28, 33, 'Tirupathi'),
(29, 33, 'Vijayawada'),
(30, 33, 'Visakhapatnam'),
(31, 33, 'Vizianagaram'),
(32, 15, 'Warangal'),
(33, 1, 'Rewa'),
(34, 10, 'BELAGAVI(BELGAUM)\r\n'),
(35, 10, 'Davangere'),
(36, 10, 'Gulbarga'),
(37, 10, 'Mangalore'),
(38, 10, 'Mysore'),
(39, 10, 'SHIVAMOGGA(SHIMOGA)'),
(40, 10, 'Mandya'),
(41, 10, 'Hubli'),
(42, 10, 'TUMAKURU(TUMKUR)\r\n'),
(43, 10, 'Kolar'),
(44, 10, 'Dharwad'),
(45, 10, 'BALLARI(BELLARY)\r\n'),
(46, 10, 'Bidar'),
(47, 10, 'Bhalki'),
(48, 10, 'Hassan'),
(49, 12, 'Chennai'),
(50, 11, 'Thiruvananthapuram'),
(51, 3, 'Prayagraj'),
(52, 3, 'Bareilly'),
(53, 3, 'Dehradun'),
(54, 3, 'Lucknow'),
(55, 3, 'Sultanpur'),
(56, 3, 'Varanasi'),
(57, 3, 'Kanpur'),
(58, 16, 'Mumbai'),
(59, 4, 'Jaipur'),
(60, 2, 'Jagdalpur'),
(61, 2, 'Ambikapur'),
(62, 12, 'Tirunelveli'),
(63, 12, 'Pondidherry'),
(64, 12, 'Coimbatore'),
(65, 12, 'Cuddalore'),
(66, 12, 'Dindigul'),
(67, 12, 'Ariyalur'),
(68, 12, 'Dharmapuri'),
(69, 12, 'Erode'),
(70, 12, 'KANCHIPURAM\r\n'),
(71, 12, 'Kanyakumari'),
(72, 12, 'Karur'),
(73, 12, 'Krishnagiri'),
(74, 12, 'Madurai'),
(75, 12, 'Nagapattinam'),
(76, 12, 'Nagercoil'),
(77, 12, 'Namakkal'),
(78, 12, 'Nilgiris'),
(79, 12, 'Perambalur'),
(80, 12, 'Pudukottai'),
(81, 12, 'Ramanathapuram'),
(82, 12, 'Salem'),
(83, 12, 'Sivagangai'),
(84, 12, 'Thanjavur'),
(85, 12, 'Theni'),
(86, 12, 'Thiruvannamalai'),
(87, 12, 'Thiruvarur'),
(88, 12, 'Thoothukudi'),
(89, 12, 'Tiruchirappalli'),
(90, 12, 'TIRUPUR\r\n'),
(91, 12, 'Tiruvallur'),
(92, 12, 'Tuticorin'),
(93, 12, 'Vellore'),
(94, 12, 'Villupuram'),
(95, 12, 'Virudhunagar'),
(96, 3, 'Agra'),
(97, 3, 'Aligarh'),
(98, 3, 'Amroha'),
(99, 3, 'Banda'),
(100, 3, 'Barabanki'),
(101, 3, 'Bijnor'),
(102, 3, 'Bulandshahr'),
(103, 3, 'Chitrakoot Dham'),
(104, 3, 'Faizabad_Old'),
(105, 3, 'Gonda'),
(106, 3, 'Gorakhpur'),
(107, 3, 'RAEBAREILLY'),
(108, 3, 'Mathura'),
(109, 3, 'Jhansi'),
(110, 3, 'Roorkee'),
(111, 3, 'Haridwar'),
(112, 3, 'Najibabad'),
(113, 3, 'Moradabad'),
(114, 3, 'Kaushambi'),
(115, 3, 'Muzaffarnagar'),
(117, 3, 'Rudrapur'),
(118, 3, 'Nainital'),
(119, 3, 'Sitapur'),
(120, 3, 'UdhamSinghNagar'),
(121, 3, 'Haldwani'),
(122, 25, 'Bhubaneshwar'),
(123, 19, 'Muzaffarpur'),
(124, 10, 'Haliyal'),
(125, 11, 'Payannur'),
(126, 16, 'Nagpur'),
(127, 6, 'Ahmedhabad'),
(128, 32, 'JAMSHEDPUR\r\n'),
(129, 11, 'KOCHI'),
(130, 12, 'TRICHY'),
(131, 11, 'THRISSUR'),
(132, 11, 'Kozhikode'),
(133, 11, 'ATTINGAL'),
(134, 11, 'NEDUMANGAD'),
(135, 11, 'NEYYATTINKARA'),
(136, 11, 'KOVALAM'),
(137, 11, 'KARUNAGAPALLI'),
(138, 11, 'SASTHANKOTTA'),
(139, 11, 'KOTTARAKARA'),
(140, 11, 'PUNALUR'),
(141, 11, 'KOLLAM'),
(142, 11, 'MAVELIKARA'),
(143, 11, 'HARIPAD'),
(144, 11, 'AMBALAPULAI'),
(145, 11, 'MANCOMBU'),
(146, 11, 'CHERTALAI'),
(147, 11, 'ALAPPUZHA'),
(148, 11, 'ADUR '),
(149, 11, 'KOZHENCHERI'),
(150, 11, 'CHANGANASSERY'),
(151, 11, 'TIRUVALLA'),
(152, 11, 'PATHANAMTHITTA'),
(153, 11, 'VAIKAM'),
(154, 11, 'PALAI'),
(155, 11, 'KOTTAYAM'),
(156, 11, 'KANJIRAPPALI'),
(157, 11, 'THIRUVANCHOOR'),
(158, 11, 'KUMARAKAM'),
(159, 11, 'CHEMPILAVU'),
(160, 11, 'KUTTIKANAM'),
(161, 11, 'MUNNAR'),
(162, 11, 'DEVIKULAM'),
(163, 11, 'NEDUMKANDAM'),
(164, 11, 'TODUPULAI'),
(165, 11, 'PIRMED'),
(166, 11, 'IDUKKI'),
(167, 11, 'PARAVOOR'),
(168, 11, 'ERNAKULAM'),
(169, 11, 'ALUVA'),
(170, 11, 'ANGAMALI'),
(171, 11, 'PERUMBAVUR'),
(172, 11, 'MUVATTUPUZHA'),
(173, 11, 'PALARIVATTOM'),
(174, 11, 'ATHANI'),
(175, 11, 'KODAKARA'),
(176, 11, 'IRINJALAKUDA'),
(177, 11, 'AMBALLUR'),
(178, 11, 'VADAKKANCHERI'),
(179, 11, 'KODUNGALLOR'),
(180, 11, 'CHAAVAKKAAD'),
(181, 11, 'PUDUKKAD'),
(182, 11, 'OTTAPPALAM'),
(183, 11, 'MANNAARKKAD'),
(184, 11, 'ALATTHUR'),
(185, 11, 'NEMMARA'),
(186, 11, 'THIRUR'),
(187, 11, 'PERINTHALMANNA'),
(188, 11, 'MALAPPURAM'),
(189, 11, 'ANGADIPPURAM'),
(190, 11, 'MANJERI'),
(191, 11, 'KUTTIPPURAM'),
(192, 11, 'MELATTUR'),
(193, 11, 'PARAPPANANGADI'),
(194, 11, 'PONNANI'),
(195, 11, 'VADAKARA'),
(196, 11, 'ARIKKULAM'),
(197, 11, 'BEYPORE'),
(198, 11, 'CHAKKALAKKAL'),
(199, 11, 'KINASSERY '),
(200, 11, 'MUKKAM'),
(201, 11, 'THAMARASSERY'),
(202, 11, 'KALPETTA'),
(203, 11, 'MANANTHAVADY'),
(204, 11, 'PADINHARETHARA'),
(205, 11, 'PANAMARAM'),
(206, 11, 'PULPALLY'),
(207, 11, 'SULTAN BATHERY'),
(208, 11, 'WAYANAD'),
(209, 11, 'AMBAYATHODE'),
(210, 11, 'ANGADIKADAVU'),
(211, 11, 'CHELORA'),
(212, 11, 'CHERUKUNNU'),
(213, 11, 'CHERUTHAZHAM'),
(214, 11, 'CHIRAKKAL'),
(215, 11, 'CHIRAKKALKULAM'),
(216, 11, 'DHARMADOM'),
(217, 11, 'DHARMASHALA'),
(218, 11, 'EDOOR'),
(219, 11, 'PERINGALAM'),
(220, 11, 'THALASSERY'),
(221, 11, 'VENGARA '),
(222, 11, 'THALIPARAMBU'),
(223, 11, 'KANHANGAD'),
(224, 11, 'KASARAGOD'),
(225, 11, 'NILESHWAR'),
(226, 11, 'UPPALA'),
(227, 11, 'TRIKARIPUR'),
(228, 11, 'MANJESHWAR'),
(229, 11, 'KUMBLA'),
(230, 11, 'AJANUR'),
(231, 11, 'CHERUVATHUR'),
(232, 11, 'PERLA'),
(233, 11, 'KUDLU'),
(234, 11, 'BEKAL'),
(235, 11, 'PADNE'),
(236, 11, 'CHENGALA'),
(237, 11, 'CHEMNAD'),
(238, 11, 'PUTHUR'),
(239, 11, 'BARE'),
(240, 11, 'MADHUR'),
(241, 11, 'KEEKAN'),
(242, 11, 'PILICODE'),
(243, 11, 'SRIBAGILU'),
(244, 11, 'BANDIYOD'),
(245, 11, 'kerala'),
(246, 11, 'Kannur'),
(247, 11, 'PALAKKAD'),
(248, 3, 'Amethi'),
(249, 3, 'Bhimtal'),
(250, 10, 'Bagalkot'),
(251, 10, 'Bijapur'),
(252, 10, 'Chikballapur'),
(253, 10, 'Chikkamagaluru'),
(254, 10, 'Dakshina Kannad'),
(255, 10, 'Gadag'),
(256, 10, 'Haveri'),
(257, 10, 'Kodagu'),
(258, 10, 'PUTTUR-KAR\r\n'),
(259, 10, 'Raichur'),
(260, 10, 'Udupi'),
(261, 10, 'Uttara Kannada'),
(262, 1, 'Chhindwara'),
(263, 1, 'Balaghat'),
(264, 12, 'Hosur'),
(265, 12, 'Tiruchendur'),
(266, 12, 'Thoothukudi'),
(267, 12, 'kumbakonam'),
(268, 12, 'virudhachalam'),
(269, 12, 'Neyveli'),
(270, 12, 'vaniyambadi'),
(271, 12, 'chidambaram'),
(272, 12, 'tiruchengode'),
(273, 3, 'Chandausi'),
(274, 33, 'Eluru'),
(275, 33, 'Machilipatnam'),
(276, 33, 'Gudivada'),
(277, 33, 'Machilipatnam'),
(278, 15, 'Nizamabad'),
(279, 33, 'Narsaraopeta'),
(280, 33, 'Hindupur'),
(281, 33, 'Puttaparthi'),
(282, 33, 'Proddatur'),
(283, 33, 'BOBBILI'),
(284, 33, 'Samalkot'),
(285, 1, 'Khandwa'),
(286, 1, 'Khargone'),
(287, 1, 'Mandsaur'),
(288, 1, 'Ratlam'),
(289, 1, 'Betul'),
(290, 1, 'Guna'),
(291, 19, 'Patna '),
(292, 19, 'Bihar Sharif'),
(293, 19, 'Siwan '),
(294, 19, 'Darbhanga '),
(295, 19, 'Chapra'),
(296, 32, 'Ranchi '),
(297, 32, 'Hazaribagh '),
(298, 32, 'BOKARO STEEL CITY\r\n'),
(299, 16, 'Chandrapur '),
(300, 16, 'Pune '),
(301, 16, 'Aurangabad '),
(302, 16, 'Navi Mumbai'),
(303, 2, 'Durg'),
(304, 13, 'Kolkata '),
(305, 25, 'Balasore '),
(306, 25, 'BERHAMPUR-GANJAM\r\n'),
(307, 25, 'Rourkela'),
(308, 6, 'Vadodara'),
(309, 6, 'Surat'),
(310, 6, 'Mehsana'),
(311, 4, 'Sikar'),
(312, 4, 'Jodhpur'),
(313, 4, 'UDAIPUR-R'),
(314, 4, 'Kota'),
(315, 16, 'Amravati'),
(316, 16, 'Latur'),
(317, 16, 'Dhule'),
(318, 16, 'Jalgaon'),
(319, 16, 'Solapur'),
(320, 16, 'Nanded'),
(321, 16, 'Kolhapur'),
(322, 16, 'Satara'),
(323, 16, 'Wardha'),
(324, 16, 'Yavatmal'),
(325, 16, 'Nashik'),
(326, 16, 'Ahmed Nagar'),
(327, 16, 'Sangli'),
(328, 16, 'Thane'),
(329, 1, 'Mandla'),
(330, 1, 'Seoni'),
(331, 1, 'Dindori'),
(332, 1, 'Narsinghpur'),
(333, 1, 'Ashoknagar'),
(334, 1, 'Bhind'),
(335, 1, 'Datia'),
(336, 1, 'Morena'),
(337, 1, 'Sheopur'),
(338, 1, 'Shivpuri'),
(339, 1, 'Harda'),
(340, 1, 'Hoshangabad'),
(341, 1, 'Raisen'),
(342, 1, 'Rajgarh'),
(343, 1, 'Sehore'),
(344, 1, 'Vidisha'),
(345, 1, 'Anuppur'),
(346, 1, 'Shahdol'),
(347, 1, 'Sidhi'),
(348, 1, 'SINGRAULI\r\n'),
(349, 1, 'Umaria'),
(350, 1, 'Chhatarpur'),
(351, 1, 'Damoh'),
(352, 1, 'Panna'),
(353, 1, 'Tikamgarh'),
(354, 1, 'Alirajpur'),
(355, 1, 'Badwani'),
(356, 1, 'Burhanpur'),
(357, 1, 'Dhar'),
(358, 1, 'Jhabua'),
(359, 1, 'Dewas'),
(360, 1, 'Mandsour'),
(361, 1, 'Neemuch'),
(362, 1, 'Shajapur'),
(363, 33, 'ANNAVARM'),
(364, 33, 'YANAM'),
(365, 13, 'Asansol'),
(366, 13, 'Durgapur'),
(367, 13, 'Hooghly'),
(368, 13, 'Kalyani'),
(369, 13, 'Berhampore'),
(370, 13, 'Midnapur'),
(371, 13, 'Bardhaman'),
(372, 13, 'SILIGURI\r\n'),
(373, 13, 'Bankura'),
(374, 16, 'Nagpur'),
(375, 1, 'Katni'),
(376, 33, 'Machilipatnam'),
(377, 33, 'Madanapalli'),
(378, 19, 'Arrah'),
(379, 19, 'Bhagalpur'),
(380, 19, 'Gaya'),
(381, 19, 'Hajipur'),
(382, 19, 'Purnea'),
(383, 19, 'Samastipur'),
(384, 32, 'Dhanbad'),
(385, 6, 'BhavNagar'),
(386, 6, 'Anand'),
(387, 6, 'Himmatnagar'),
(388, 6, 'Jamnagar'),
(389, 6, 'Navsari'),
(390, 6, 'Rajkot'),
(391, 6, 'Vapi'),
(392, 25, 'Baripada'),
(393, 25, 'Cuttack'),
(394, 25, 'Sambalpur'),
(395, 4, 'Ajmer'),
(396, 4, 'Alwar'),
(397, 4, 'Bhilwara'),
(398, 4, 'Bikaner'),
(399, 4, 'Bharatpur'),
(400, 18, 'Panaji'),
(401, 18, 'Madgaon'),
(402, 8, 'Delhi'),
(403, 8, 'NEW DELHI\r\n'),
(404, 9, 'Ambala'),
(405, 9, 'Bahadurgarh'),
(406, 9, 'GuruGram'),
(407, 9, 'Hisar'),
(408, 9, 'Karnal'),
(409, 9, 'Faridabad'),
(410, 9, 'Kurukshetra'),
(411, 9, 'Palwal'),
(412, 9, 'Panipat'),
(413, 9, 'Rohtak'),
(414, 9, 'Sonipat'),
(415, 9, 'Yamuna Nagar'),
(416, 3, 'Ghaziabad'),
(417, 3, 'Greater Noida'),
(418, 3, 'Noida'),
(419, 3, 'Meerut'),
(420, 13, 'Howrah'),
(421, 13, 'Burdwan'),
(422, 13, 'Kharagpur'),
(423, 1, 'Ashta'),
(424, 1, 'Bioara'),
(425, 1, 'Dabra'),
(426, 1, 'Gadarwara'),
(427, 1, 'Gohad'),
(428, 1, 'Itarsi'),
(429, 1, 'Kalapipal'),
(430, 1, 'Khilchipur'),
(431, 1, 'Kurawar'),
(432, 1, 'Multai'),
(433, 1, 'Nasrullaganj'),
(434, 1, 'Niwas'),
(435, 1, 'Rehti'),
(436, 1, 'Sarangpur'),
(439, 1, 'Karera'),
(440, 1, 'Saunsar'),
(441, 3, 'Firozabad'),
(442, 3, 'Mainpuri'),
(443, 3, 'Etah'),
(444, 3, 'Hathras'),
(445, 3, 'Kasganj'),
(446, 3, 'Fatehpur'),
(447, 3, 'Azamgarh'),
(448, 3, 'Ballia'),
(449, 3, 'MAU'),
(450, 3, 'Badaun'),
(451, 3, 'Pilibhit'),
(452, 3, 'Basti'),
(453, 3, 'SantKabirNagar'),
(454, 3, 'Siddharthnagar'),
(455, 3, 'Baharaich'),
(456, 3, 'Shravasti'),
(457, 3, 'Balrampur'),
(458, 3, 'AKBARPUR(AMBEDKAR NAGAR)'),
(459, 3, 'Mahoba'),
(460, 3, 'DEORIA'),
(461, 3, 'KUSHINAGAR'),
(462, 3, 'Maharajganj'),
(463, 3, 'JALAUN'),
(464, 3, 'Lalitpur'),
(465, 3, 'Auraiya'),
(466, 3, 'Etawah'),
(467, 3, 'Farrukhabad'),
(468, 3, 'Kannauj'),
(469, 3, 'KanpurDehat'),
(470, 3, 'Hardoi'),
(471, 3, 'Unnao'),
(472, 3, 'Baghpat'),
(473, 3, 'GautamBuddhaNagar'),
(474, 3, 'Hapur'),
(475, 3, 'Mirzapur'),
(476, 3, 'SANTRAVIDAS NAGAR'),
(477, 3, 'SONBHADRA'),
(478, 3, 'Amroha'),
(479, 3, 'Rampur'),
(480, 3, 'Sambhal'),
(481, 3, 'Saharanpur'),
(482, 3, 'Shamli'),
(483, 3, 'CHANDAULI'),
(484, 3, 'Ghazipur'),
(485, 3, 'Pratapgarh'),
(486, 3, 'Shahjahanpur'),
(487, 3, 'Hamirpur'),
(488, 3, 'LakhimpurKhiri'),
(489, 15, 'Adilabad'),
(490, 15, 'Peddapalli'),
(491, 15, 'Siddipet'),
(492, 15, 'Kodad'),
(493, 15, 'MahaboobNagar'),
(494, 15, 'SECUNDERABAD\r\n'),
(495, 15, 'Nalgonda'),
(496, 3, 'JAUNPUR'),
(497, 3, 'Hathras'),
(498, 1, 'Baran'),
(499, 2, 'Barmer'),
(503, 1, 'Dhaulpur'),
(504, 1, 'Bundi'),
(506, 1, 'Jaisalmer'),
(507, 1, 'Jalore'),
(512, 1, 'Jhalawar'),
(513, 1, 'Karauli'),
(514, 1, 'Pali'),
(517, 1, 'Sirohi'),
(518, 1, 'SawaiMadhopur'),
(519, 6, 'Gandhinagar'),
(520, 33, 'Markapuram'),
(521, 4, 'Abu Road'),
(522, 4, 'Barmer'),
(523, 4, 'Chittorgarh'),
(524, 4, 'Banswara'),
(525, 4, 'Barmer'),
(526, 4, 'Dholpur'),
(527, 4, 'Didwana'),
(528, 4, 'Dungarpur'),
(529, 4, 'Jaisalmer'),
(530, 4, 'Jalore'),
(531, 4, 'Jhunjhunu'),
(532, 4, 'Kankroli'),
(533, 4, 'Pali'),
(534, 4, 'Pratapgarh'),
(535, 4, 'Rajsamand'),
(536, 29, 'PORT BLAIR-WB'),
(537, 33, 'ADONI'),
(538, 33, 'AMALAPURAM'),
(539, 33, 'BAPATLA'),
(540, 33, 'CHALLAPALLI'),
(541, 33, 'CHIMAKURTHY'),
(542, 33, 'EAST GODAVARI'),
(543, 33, 'GOOTY'),
(544, 33, 'GUDLAVALLERU'),
(545, 33, 'GUDUR\r\n'),
(546, 33, 'KANCHIKACHERLA'),
(547, 33, 'KAVALI'),
(548, 33, 'KUPPAM'),
(549, 33, 'MADANAPALLE\r\n'),
(550, 33, 'MARKAPUR'),
(551, 33, 'MYLAVARAM'),
(552, 33, 'NANDYAL'),
(553, 33, 'NARASAPURAM\r\n'),
(554, 33, 'NARASARAOPET'),
(555, 33, 'NARSIPATNAM'),
(556, 33, 'PULIVENDULA'),
(557, 33, 'PUTTUR-AP'),
(558, 33, 'RAJAM'),
(559, 33, 'RAJAMPET'),
(560, 33, 'SURAMPALEM'),
(561, 33, 'TADEPALLIGUDEM'),
(562, 33, 'TEKKALI'),
(563, 33, 'TENALI'),
(564, 33, 'WEST GODAVARI'),
(565, 33, 'YEMMIGANUR'),
(566, 20, 'ITANAGAR'),
(567, 20, 'NAHARLAGUN'),
(568, 20, 'PAPUM PARE'),
(569, 14, 'BONGAIGAON'),
(570, 14, 'DHUBRI\r\n'),
(571, 14, 'DIBRUGARH'),
(572, 14, 'DIPHU'),
(573, 14, 'GOLAGHAT'),
(574, 14, 'GUWAHATI'),
(575, 14, 'JORHAT'),
(576, 14, 'KOKRAJHAR'),
(577, 14, 'SILCHAR'),
(578, 14, 'TEZPUR'),
(579, 14, 'TINSUKIA'),
(580, 19, 'AURANGABAD-B'),
(581, 19, 'BEGUSARAI'),
(582, 19, 'CHHAPRA'),
(583, 19, 'SASARAM'),
(584, 30, 'ABOHAR'),
(585, 30, 'AMRITSAR'),
(586, 30, 'BANAUR'),
(587, 30, 'BARNALA'),
(588, 30, 'BHATINDA'),
(589, 30, 'CHANDIGARH'),
(590, 30, 'FARIDKOT'),
(591, 30, 'FATEHGARH SAHIB'),
(592, 30, 'FEROZEPUR CITY'),
(593, 30, 'GURDASPUR'),
(594, 30, 'HOSHIARPUR'),
(595, 30, 'JALANDHAR'),
(596, 30, 'KAPURTHALA'),
(597, 30, 'KHANNA'),
(598, 30, 'LUDHIANA'),
(599, 30, 'MALOUT'),
(600, 30, 'MOGA'),
(601, 30, 'MOHALI'),
(602, 30, 'MUKTSAR'),
(603, 30, 'NAWANSHAHR'),
(604, 30, 'PATHANKOT'),
(605, 30, 'PATIALA'),
(606, 30, 'PHAGWARA'),
(607, 30, 'ROPAR'),
(608, 30, 'SANGRUR'),
(609, 30, 'SIRHIND'),
(611, 2, 'BHILAI NAGAR'),
(612, 2, 'BILASPUR-C'),
(613, 2, 'KORBA'),
(614, 2, 'RAIGARH'),
(615, 2, 'RAJNANDGAON'),
(616, 34, 'SILVASSA'),
(617, 35, 'DAMAN'),
(618, 35, 'DIU'),
(619, 18, 'FARMAGUDI'),
(620, 18, 'MAPUSA'),
(621, 18, 'PONDA'),
(622, 18, 'SOUTH GOA'),
(623, 18, 'VASCO DA GAMA'),
(624, 18, 'VERNA'),
(625, 6, 'AMRELI'),
(626, 6, 'ANKLESHWAR'),
(627, 6, 'BHARUCH'),
(628, 6, 'BHUJ'),
(629, 6, 'DAHOD'),
(630, 6, 'DWARKA'),
(631, 6, 'GODHRA'),
(632, 6, 'JETPUR'),
(633, 6, 'JUNAGADH'),
(634, 6, 'KHEDA'),
(635, 6, 'KUTCH'),
(636, 6, 'MUNDRA'),
(637, 6, 'NADIAD'),
(638, 6, 'PALANPUR'),
(639, 6, 'PANCHMAHAL'),
(640, 6, 'PATAN'),
(641, 6, 'PORBANDAR'),
(642, 6, 'SURENDRANAGAR'),
(643, 6, 'VALSAD'),
(644, 9, 'BHIWANI'),
(645, 9, 'JHAJJAR'),
(646, 9, 'JIND'),
(647, 9, 'KAITHAL'),
(648, 9, 'MAHENDRAGARH'),
(649, 9, 'NARWANA'),
(650, 9, 'PANCHKULA'),
(651, 9, 'REWARI'),
(652, 9, 'SIRSA'),
(653, 9, 'THANESAR'),
(654, 36, 'BADDI'),
(655, 36, 'BILASPUR-H'),
(656, 36, 'CHAMBA'),
(657, 36, 'DHARAMSALA'),
(658, 36, 'KANGRA'),
(659, 36, 'KULLU'),
(660, 36, 'MANDI'),
(661, 36, 'NALAGARH'),
(662, 36, 'PALAMPUR'),
(663, 36, 'SHIMLA'),
(664, 36, 'SIRMAUR'),
(665, 36, 'SOLAN'),
(666, 36, 'SUNDER NAGAR'),
(667, 36, 'UNA'),
(668, 17, 'ANANTNAG'),
(669, 17, 'AWANTIPORA'),
(670, 17, 'BARAMULLA'),
(671, 17, 'BHAJWAL'),
(672, 17, 'BUDGAM'),
(673, 17, 'GANDERBAL'),
(674, 17, 'JAMMU'),
(675, 17, 'KATHUA'),
(676, 17, 'LEH'),
(677, 17, 'PULWAMA'),
(678, 17, 'RAJOURI'),
(679, 17, 'SAMBA'),
(680, 17, 'SOPORE'),
(681, 17, 'SRINAGAR'),
(682, 17, 'UDHAMPUR'),
(683, 32, 'DEOGHAR'),
(684, 32, 'KODERMA'),
(685, 32, 'RAMGARH'),
(686, 10, 'CHAMRAJNAGAR'),
(687, 10, 'CHITRADURGA'),
(688, 10, 'SURATHKAL'),
(689, 10, 'VIJAYAPURA(BIJAPUR)'),
(690, 37, 'KAVARATTI'),
(691, 1, 'AGAR'),
(692, 1, 'BARWANI'),
(693, 1, 'THANDLA'),
(694, 21, 'IMPHAL'),
(695, 22, 'RI-BHOI'),
(696, 22, 'SHILLONG'),
(697, 22, 'TURA'),
(698, 23, 'AIZAWL'),
(699, 24, 'DIMAPUR'),
(700, 24, 'KOHIMA'),
(701, 25, 'ANGUL'),
(702, 25, 'BALANGIR'),
(703, 25, 'BARGARH'),
(704, 25, 'BHADRAK'),
(705, 25, 'BHAWANIPATNA'),
(706, 25, 'DHENKANAL'),
(707, 25, 'JAGATSINGHPUR'),
(708, 25, 'JAJPUR TOWN'),
(709, 25, 'JEYPORE'),
(710, 25, 'JHARSUGUDA'),
(711, 25, 'KENDRAPARA'),
(712, 25, 'KEONJHAR'),
(713, 25, 'KHURDA'),
(714, 25, 'KORAPUT'),
(715, 25, 'NAYAGARH'),
(716, 25, 'PHULBANI'),
(717, 25, 'PURI'),
(718, 25, 'RAYAGADA'),
(719, 25, 'SALEPUR'),
(720, 25, 'SONEPUR'),
(721, 4, 'HANUMANGARH'),
(722, 4, 'NATHDWARA'),
(723, 4, 'NEEMRANA'),
(724, 4, 'PALI MARWAR'),
(725, 4, 'SAWAI MADHOPUR'),
(726, 4, 'SRIGANGANAGAR'),
(727, 4, 'TONK'),
(728, 26, 'BARDANG'),
(729, 26, 'GANGTOK'),
(730, 26, 'MAJITAR'),
(731, 26, 'SOUTH SIKKIM'),
(732, 12, 'COONOOR'),
(733, 12, 'KALLAKURICHI'),
(734, 12, 'KARAIKUDI'),
(735, 12, 'POLLACHI'),
(736, 12, 'PUDUCHERRY'),
(737, 12, 'PUDUKKOTTAI'),
(738, 12, 'TINDIVANAM'),
(739, 12, 'TIRUVANNAMALAI'),
(740, 12, 'TIRUVARUR'),
(741, 15, 'BHUVANAGIRI'),
(742, 15, 'DESHMUKHI'),
(743, 15, 'MAHABUBNAGAR'),
(744, 15, 'MEDAK'),
(745, 15, 'RANGA REDDY'),
(746, 27, 'AGARTALA'),
(747, 27, 'BISHRAMGANJ'),
(748, 27, 'KHOWAI'),
(749, 27, 'TELIAMURA'),
(750, 27, 'UDAIPUR-T'),
(751, 3, 'BAGPAT'),
(752, 3, 'BAHRAICH'),
(753, 3, 'KASHIPUR'),
(754, 3, 'KHALILABAD'),
(755, 3, 'KHURJA'),
(756, 13, '24 PARAGANAS'),
(757, 13, 'BAHARAMPUR'),
(758, 13, 'BARUIPUR'),
(759, 13, 'BIRBHUM'),
(760, 13, 'BISHNUPUR'),
(761, 13, 'COOCHBEHAR'),
(762, 13, 'DARJEELING'),
(763, 13, 'DINAJPUR'),
(764, 13, 'HALDIA'),
(765, 13, 'ISLAMPUR, UTTAR DINA'),
(766, 13, 'JALPAIGURI'),
(767, 13, 'KRISHNANAGAR'),
(768, 13, 'MALDA'),
(769, 13, 'MURSHIDABAD'),
(770, 13, 'NADIA'),
(771, 13, 'PURULIA'),
(772, 13, 'RANIGANJ'),
(773, 13, 'SURI'),
(774, 13, 'UTTAR DINAJPUR'),
(775, 3, 'AYODHYA'),
(776, 3, 'ALMORA'),
(777, 3, 'PAURI GARHWAL');

-- --------------------------------------------------------

--
-- Table structure for table `ida_company_info`
--

CREATE TABLE `ida_company_info` (
  `company_info_id` int(11) NOT NULL,
  `company_owner` varchar(150) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_phone` varchar(15) NOT NULL,
  `company_address` text NOT NULL,
  `company_logo` varchar(20) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ida_state`
--

CREATE TABLE `ida_state` (
  `state_id` int(2) NOT NULL,
  `state_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ida_state`
--

INSERT INTO `ida_state` (`state_id`, `state_name`) VALUES
(1, 'Madhya Pradesh'),
(2, 'Chattisgarh'),
(3, 'Uttar Pradesh & Uttrakhand'),
(4, 'Rajasthan'),
(6, 'Gujrat'),
(7, 'Punjab'),
(8, 'DELHI-NCR\r\n'),
(9, 'Haryana'),
(10, 'Karnataka'),
(11, 'Kerala'),
(12, 'Tamil Nadu'),
(13, 'West Bengal'),
(14, 'Assam'),
(15, 'Telangana'),
(16, 'Maharashtra'),
(17, 'Jammu & Kashmir'),
(18, 'Goa'),
(19, 'Bihar'),
(20, 'Arunachal Pradesh'),
(21, 'Manipur'),
(22, 'Meghalaya'),
(23, 'Mizoram'),
(24, 'Nagaland'),
(25, 'Orissa'),
(26, 'Sikkim'),
(27, 'Tripura'),
(29, 'Andaman & Nicobar'),
(30, 'Chandigarh'),
(32, 'Jharkhand'),
(33, 'Andhra Pradesh'),
(34, 'Dadra And Nagar Haveli'),
(35, 'Daman & DIU'),
(36, 'Himachal Pradesh'),
(37, 'Lakshadweep'),
(38, 'Puducherry');

-- --------------------------------------------------------

--
-- Table structure for table `ida_user`
--

CREATE TABLE `ida_user` (
  `user_id` int(11) NOT NULL,
  `user_unique_id` varchar(50) NOT NULL,
  `user_type_id` varchar(2) NOT NULL,
  `email_type` enum('Home','Work') NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(30) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('0','1','2') NOT NULL COMMENT '	0-pending 1-active, 2-deactivate,',
  `_token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ida_user`
--

INSERT INTO `ida_user` (`user_id`, `user_unique_id`, `user_type_id`, `email_type`, `email`, `password`, `create_date`, `status`, `_token`) VALUES
(1, 'IDEA01', '1', 'Work', 'admin@gmail.com', '123456', '2022-02-07 11:07:04', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `ida_user_info`
--

CREATE TABLE `ida_user_info` (
  `user_info_id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `designation` enum('Ceo','Cfo','Coo','Chr','Project manager','Product manager','Seo','Digital marketing','Content manager','Ui/ux designer','Developer') NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `phone_no_type` enum('Mobile','Work','Home','Wattsapp') NOT NULL,
  `Phone_no` varchar(15) NOT NULL,
  `address_type` enum('Billing','Shipping','Home','Work') NOT NULL,
  `address` text NOT NULL,
  `city` varchar(3) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `facebook_link` text NOT NULL,
  `insta_link` text NOT NULL,
  `linkedin_link` text NOT NULL,
  `twitter_link` text NOT NULL,
  `profile_pic` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ida_user_info`
--

INSERT INTO `ida_user_info` (`user_info_id`, `user_id`, `designation`, `first_name`, `middle_name`, `last_name`, `phone_no_type`, `Phone_no`, `address_type`, `address`, `city`, `state`, `zip_code`, `facebook_link`, `insta_link`, `linkedin_link`, `twitter_link`, `profile_pic`) VALUES
(10, '1', 'Ceo', 'John', '', 'Doe', 'Work', '9826098260', 'Work', 'Fred road', '3', '1', '123454', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ida_user_type`
--

CREATE TABLE `ida_user_type` (
  `user_type_id` int(11) NOT NULL,
  `user_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ida_user_type`
--

INSERT INTO `ida_user_type` (`user_type_id`, `user_type`) VALUES
(1, 'Admin'),
(2, 'Employee'),
(3, 'Contractor'),
(4, 'Client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ida_city`
--
ALTER TABLE `ida_city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `ida_company_info`
--
ALTER TABLE `ida_company_info`
  ADD PRIMARY KEY (`company_info_id`);

--
-- Indexes for table `ida_state`
--
ALTER TABLE `ida_state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `ida_user`
--
ALTER TABLE `ida_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `ida_user_info`
--
ALTER TABLE `ida_user_info`
  ADD PRIMARY KEY (`user_info_id`);

--
-- Indexes for table `ida_user_type`
--
ALTER TABLE `ida_user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ida_city`
--
ALTER TABLE `ida_city`
  MODIFY `city_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=778;

--
-- AUTO_INCREMENT for table `ida_company_info`
--
ALTER TABLE `ida_company_info`
  MODIFY `company_info_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ida_state`
--
ALTER TABLE `ida_state`
  MODIFY `state_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `ida_user`
--
ALTER TABLE `ida_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ida_user_info`
--
ALTER TABLE `ida_user_info`
  MODIFY `user_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ida_user_type`
--
ALTER TABLE `ida_user_type`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;