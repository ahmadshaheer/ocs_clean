-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2017 at 06:29 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ocs`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_dr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_pa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_en` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_dr` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_pa` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `title_en`, `title_dr`, `title_pa`, `date_en`, `date_dr`, `date_pa`, `image`) VALUES
(1, NULL, NULL, 'هند په لومړي ځل د چابهار له لارې افغانستان ته غنم ولېږل', NULL, NULL, '1396 - 08 - 10', '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `album_image`
--

CREATE TABLE `album_image` (
  `id` int(11) NOT NULL,
  `title_en` varchar(250) DEFAULT NULL,
  `title_dr` varchar(250) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `title_pa` varchar(250) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `image` varchar(10) NOT NULL,
  `album_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `biography`
--

CREATE TABLE `biography` (
  `id` int(11) NOT NULL,
  `bio_en` text,
  `bio_dr` text CHARACTER SET utf32 COLLATE utf32_persian_ci,
  `bio_pa` text CHARACTER SET utf32 COLLATE utf32_persian_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biography`
--

INSERT INTO `biography` (`id`, `bio_en`, `bio_dr`, `bio_pa`) VALUES
(2, NULL, NULL, '<h1 style=\"text-align: right;\">تاریخچه&nbsp;ارگ</h1>\r\n<div>\r\n<p style=\"text-align: right;\">&nbsp;&nbsp;&nbsp;&nbsp; کابل شهری است&nbsp; با تاریخی کهن که مامن پادشاهان و امرای بسیاری بوده است. در گذشته حصاری آن را در بر می گرفت که تا هنوز آثار آن دیوار ها باقی است. برای ورود به داخل شهر، شش دروازه وجود داشت که هر یک با اسامی خاص شناخته می شد. از جمله ی این دروازه ها می توان از دروازه ی کندهاری که در دهمزنگ امروزی واقع بود، دروازه سردار جهان خان ، در قسمت سلام خانه ، اسپینه دروازه ، دروازه پیت در عقب مسجد عیدگاه ، دروازه گذرگاه به سمت بالا حصار واقع بود و دروازه لاهوری نیز یکی از این شش دروازه بوده است که تا هنوز بعضی از کهن سالان در خاطرات شان از آن یاد می کنند.&nbsp;&nbsp;<br /><br />مرکز حکم رانی پادشاه در بالاحصار قرار داشت. قبل از زمامداری عبدالرحمن خان برای سکونت شاه مکان مناسبی وجود نداشت. بالاحصار و ارگ شیر پور در جنگ های افغان و انگلیس آسیب دیده و قسمت هایی از آن سوخته بود. در زمان حکمرانی امیر شیرعلی خان کار ساخت قلعه ی شیرپور به دستور وی آغاز شده بود، اما با حمله ی انگلیسی ها به کابل&nbsp; در&nbsp; سال 1878 م ، امیر به شهر مزار&nbsp; رفت و کار ساخت و ساز ارگ نا تکمیل باقی ماند. زمانی که امیر&nbsp; عبدالرحمان خان از شمال به کابل آمد و قدرت را در دست گرفت، برای سکونت&nbsp; پادشاه مکان مناسبی وجود نداشت. عبدالرحمن خان شب اول را در منزل غازی عبدالله خان وردک که در ده افغانان کنونی موقعیت داشت، سپری کرد.&nbsp;<br /><br />امیر عبدالرحمان خان در سال 1299 هجری قمری&nbsp; طرح ساخت ارگ را روی دست گرفت. در این زمان شاه به خاطر تنظیم امور نظامی به جلال آباد سفر کرد و چندی در جلال آباد ماند. امیر به پسر بزرگ خود نامه فرستاد و از وی خواست که در مشوره با مشاورین کار ساخت ارگ را در محل امروزی آغاز کند. بلاخره کار ساخت ارگ توسط تعدادی از معماران ماهر و ورزیده در سال 1300 هـ..ق آغاز شد.<br /><br />در ساحه ای که امروز ارگ قرار دارد قبلاً آبادی وجود نداشت، بلکه یک دشت خاکی بود. در قسمت هایی از&nbsp; این ساحه مزرعه و باغ وجود داشت و در اطراف آن بیابان واقع شده بود.&nbsp; در ساحه ی ده افغانان فعلی یک بازار کوچک وجود داشت ، محله ی وزیر محمد اکبر خان مینه دشت بود که بعدها در زمان غازی امان الله خان اولین میدان هوایی در آن جا تاسیس شد.<br /><br />هم زمان با ساخت ارگ برخی تعمیرهای دیگر نیز اعمار شد . یکی \" بستان سرای \" نامیده&nbsp; می شد که در پارک زرنگار کنونی موقعیت داشت. و امروز مزار امیر عبدالرحمان خان در آن جا موقعیت دارد. تعمیر دیگر که امیر عبدالرحمان خان در آن جا زندگی می کرد \" گلستان سرای \" نامیده می شد که در مقابل وزارت معارف و در محوطه ی امروز شاروالی کابل&nbsp; واقع شده بود . این دو بنا در آن زمان مربوط به ارگ می شد.<br /><br />در حال حاضر برخی تاسیسات ارگ در نقشه ی شهری&nbsp; کابل امروز موجود نیست. بعضی از این تعمیر ها&nbsp; از بین رفته و برخی به شکل اصلی ترمیم شده و تا هنوز باقی&nbsp; است.&nbsp; در حال حاضر بعضی از این تعمیر ها در داخل ارگ و بعضی دیگر در بیرون از محوطه ارگ قرار دارد. به عنوان نمونه&nbsp; قصر استوری در وزارت خارجه قرار دارد و در قصر ناک باغ،&nbsp; آرشیف ملی جابجا شده است . قصر زین العمارت به قصر صدارت کنونی اطلاق می شد که از سوی نایب لسلطنه نصر الله خان اعمار شده است.<br />از لحاظ موقعیت؛ ارگ در نقطه مرکزی شهر کابل واقع شده است.&nbsp; در جهت شرق&nbsp; ده افغانان، سمت شمال غرب محله ی مراد خانی موقعیت دارد.&nbsp;&nbsp; از&nbsp; مقابل ارگ&nbsp; جاده پشتونستان وات الی مکروریان ها، جاده ای وجود دارد که در طرف دیگر آن وزارت معادن ، اداره امور&nbsp; و وزارت دفاع ملی موقعیت دارد. در شمال شرق ارگ چهار راهی آریانا و در طرف دیگر آن هوتل آریانا و اداره احصاییه مرکزی موقعیت دارد.&nbsp; از قسمت شمال، جاده ی عمومی عبور کرده و در&nbsp; آن سوی سرک لیسه امانی و منازل مسکونی ساحه وزیر اکبر خان واقع شده است. در غرب ارگ وزارت خارجه ، سفارت چین و دفاتر سازمان ملل متحد موقعیت دارند. در&nbsp; نقطه ی جنوبی&nbsp; عزیزی سنتر و بناهای دیگر است.<br /><br />اولین ساختمان اعمار شده در داخل ارگ،&nbsp; کوتی باغچه نامیده می شود که کار ساخت آن در سال 1304 هجری قمری تکمیل شد.&nbsp; پس از&nbsp; آن چندین تعمیر دیگر&nbsp; نیز اعمار شد به طور مثال؛ تعمیر ارگ ، قصر سلام خانه ،گنبد نقاره خانه ، بازار ارگ کوتوالي، قرارگاه شاهی ، حمام شاهی، دفتر مستوفی الممالک،&nbsp; قصر سلام خانه. &nbsp;</p>\r\n</div>');

-- --------------------------------------------------------

--
-- Table structure for table `chief`
--

CREATE TABLE `chief` (
  `id` int(11) NOT NULL,
  `desc_en` text CHARACTER SET utf32 COLLATE utf32_persian_ci,
  `desc_dr` text CHARACTER SET utf32 COLLATE utf32_persian_ci,
  `desc_pa` text CHARACTER SET utf32 COLLATE utf32_persian_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_dr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_pa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_en` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_dr` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_pa` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf_dr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf_pa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `title_en`, `title_dr`, `title_pa`, `date_en`, `date_dr`, `date_pa`, `pdf_en`, `pdf_dr`, `pdf_pa`) VALUES
(1, NULL, 'خلاصه گزارش حکومت به شورای ملی ۱۳۹۵', 'خلاصه گزارش حکومت به شورای ملی ۱۳۹۵', NULL, '1396 - 08 - 11', '1396 - 08 - 11', NULL, '1.pdf', '1.pdf'),
(2, NULL, 'خلاصه گزارش حکومت به شورای ملی ۱۳۹۴', NULL, NULL, '1396 - 08 - 11', NULL, NULL, '2.pdf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expert_registeration`
--

CREATE TABLE `expert_registeration` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `father_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `nationality` varchar(20) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `passport` varchar(20) NOT NULL,
  `email1` varchar(30) NOT NULL,
  `email2` varchar(30) NOT NULL,
  `email3` varchar(30) NOT NULL,
  `phone1` int(11) NOT NULL,
  `phone2` int(11) NOT NULL,
  `phone3` int(11) NOT NULL,
  `facebook` varchar(20) NOT NULL,
  `twitter` varchar(20) NOT NULL,
  `linked_in` varchar(20) NOT NULL,
  `type` enum('writer','attendee') NOT NULL,
  `type_text` varchar(10) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `language` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `starting_date` varchar(20) NOT NULL,
  `discipline` varchar(250) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `specialization` varchar(250) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `infographics`
--

CREATE TABLE `infographics` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_dr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_pa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_en` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_dr` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_pa` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `journalist_registeration`
--

CREATE TABLE `journalist_registeration` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `father_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `nationality` varchar(20) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `passport` varchar(20) NOT NULL,
  `email1` varchar(30) NOT NULL,
  `email2` varchar(30) NOT NULL,
  `email3` varchar(30) NOT NULL,
  `phone1` int(11) NOT NULL,
  `phone2` int(11) NOT NULL,
  `phone3` int(11) NOT NULL,
  `discipline` varchar(200) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `facebook` varchar(20) NOT NULL,
  `twitter` varchar(20) NOT NULL,
  `linked_in` varchar(20) NOT NULL,
  `type` enum('writer','photographer','reporter','cartonist','other') NOT NULL,
  `type_text` varchar(10) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `language` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `starting_date` varchar(20) NOT NULL,
  `cureent_media` varchar(200) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `previous_media` varchar(200) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `address` varchar(200) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `o_email1` varchar(20) NOT NULL,
  `o_email2` varchar(20) NOT NULL,
  `o_email3` varchar(20) NOT NULL,
  `o_phone1` int(11) NOT NULL,
  `o_phone2` int(11) NOT NULL,
  `o_phone3` int(11) NOT NULL,
  `o_website` varchar(20) NOT NULL,
  `o_facebook` varchar(20) NOT NULL,
  `o_twitter` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `title_en` varchar(100) NOT NULL,
  `title_dr` varchar(100) CHARACTER SET utf32 COLLATE utf32_persian_ci NOT NULL,
  `title_pa` varchar(100) CHARACTER SET utf32 COLLATE utf32_persian_ci NOT NULL,
  `description_en` varchar(250) NOT NULL,
  `description_dr` varchar(250) CHARACTER SET utf32 COLLATE utf32_persian_ci NOT NULL,
  `description_pa` varchar(250) CHARACTER SET utf32 COLLATE utf32_persian_ci NOT NULL,
  `url` varchar(100) NOT NULL,
  `image` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_dr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_pa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_en` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_dr` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_pa` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc_dr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc_pa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_dr` text COLLATE utf8mb4_unicode_ci,
  `description_pa` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('news','article') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `title_en`, `title_dr`, `title_pa`, `date_en`, `date_dr`, `date_pa`, `short_desc_en`, `short_desc_dr`, `short_desc_pa`, `description_en`, `description_dr`, `description_pa`, `image`, `type`, `tags`) VALUES
(16, NULL, 'تمثیل اراده ملی در قدرت', NULL, NULL, '1396 - 08 - 11', NULL, NULL, 'افغانستان صاحب یک نظام دموکراتیک می‌باشد و اساس منبع قدرت، قانون اساسی و مردم است. این مردم‌اند که رئیس‌جمهور، پارلمان و شوراهای ولایتی را انتخاب می‌کنند تا در خدمت مردم باشند و اینگونه دایره قدرت و خدمت به مردم، تکمیل می‌شود.', NULL, NULL, '<p style=\"text-align: right;\"><br />افغانستان صاحب یک نظام دموکراتیک می&zwnj;باشد و اساس منبع قدرت، قانون اساسی و مردم است. این مردم&zwnj;اند که رئیس&zwnj;جمهور، پارلمان و شوراهای ولایتی را انتخاب می&zwnj;کنند تا در خدمت مردم باشند و اینگونه دایره قدرت و خدمت به مردم، تکمیل می&zwnj;شود.<br />رئیس&zwnj;جمهور محمد اشرف غنی، هنگام انتخابات ریاست جمهوری، در منشور تیم انتخاباتی خود گفته است: &laquo;برای نجات از بحران، باید حکومت مردم&zwnj;سالار تأسیس شود. حکومت&zwnj; مردم&zwnj;سالار، برعکس حکومت&zwnj; خودکامه، مبتنی بر اراده و رأی مردم است.&raquo;(1)<br />هدف رئیس&zwnj;جمهور در این سخنان این بوده که در مسایل و بخش&zwnj;های مختلف، باید نظریات مردم را با خود داشت و با توافق مردم، برای رفع مشکلات، یک راه حل مشترک را پیدا نمود؛ زیرا حل مشکلات در یک کشور، مسؤولیت مشترک دولت و مردم است.<br /><br />ضرورت و فایده اراده مردمی در قدرت چیست؟<br />قانون اساسی افغانستان، پایه و اساس قدرت مردمی است. بر این اساس، مردم در هر پنج سال رئیس&zwnj;جمهور را انتخاب می&zwnj;کنند. این مردم&zwnj;اند که بر مبنای خواست خود، به کاندیدای مورد نظرشان رأی می&zwnj;دهند و از این طریق برای آرامی و آسایش زندگی و حل مشکلات&zwnj;شان یک فرد شایسته را انتخاب می&zwnj;کنند. این شخص بر اساس معیارهای خاص قانونی انتخاب می&zwnj;شود.<br />علاوه بر شرایط عینی جامعه، بعضی از شرایط دیگر نیز هست که شخص منتخب مردم، باید خود را با آن برابر سازد. این شخص باید در بخش&zwnj;های مختلف، توانایی کار و راه&zwnj;اندازی&nbsp; برنامه&lrm;های قوی را داشته باشد. وقتی مردم بر اساس شرایط مذکور مسؤولیت قدرت را به اشخاص می&zwnj;سپارند، حق خواهند داشت که از تصمیمات بزرگ باخبر شوند و همراه&zwnj;شان شریک شوند.<br />با توجه به این اصل، رئیس&zwnj;جمهور در منشور تیم انتخاباتی تحول و تداوم به گونه آشکار اشاره نموده که &laquo;تحول&raquo; از نیازمندی&zwnj;ها و ضرورت&zwnj;های بنیادی جامعه ماست. به خاطراین که :&laquo;ما دارای&nbsp; نظام سیاسی دموکراتیک هستیم. این نظام از لحاظ شکلی مشارکت گسترده&zwnj;ی شهروندان کشور را در همه&zwnj;ی عرصه&zwnj;های حیات جمعی تضمین نموده است؛ اما از لحاظ محتوایی هنوز هم به تحولات عمیق و بنیادی ضرورت داریم. تا این مشارکت شهروندی از پشتوانه&zwnj;های نهادی در فکر، فرهنگ، ادبیات و رفتار جمعی ما برخوردار شده و در برابر تمایلات فردی و گرایشات دیکتاتورانه، تمامیت&zwnj;خواهانه و غیردموکراتیک مصونیت یابد.&raquo;(2)<br />علاوه بر این اتباع کشور حق پرسش از حکومت را دارند و این حق مردم است که حکومت را مورد سؤال قرار دهد. رئیس&zwnj;جمهور در منشور خود به این مورد به طور واضح اشاره کرده و گفته است: &laquo;حق دیگری که همه&zwnj;ی شهروندان را معنادار می&zwnj;سازد&zwnj;، حق پرسش از دولت است. افراد حق دارند از دولت بپرسند که وجیبه&zwnj;های خود در برابر شهروندان را چگونه عملی کرده است؛ بیت&zwnj;المال را چگونه به مصرف رسانده است؛ در انجام تعهدات و وظایف محوله چه قدر موفق بوده است؛ و از مجموعه&zwnj;ی کاکردهای خود برای ملت به حیث منبع مشروعیت دولت چگونه گزارش و حساب می&zwnj;دهد. بنابراین حق حساب خواستن یکی از عمده&zwnj;ترین حقوق سیاسی شهروندان است و این حق در حکومت به صورت اساسی و نهادی مدنظر گرفته می&zwnj;شود.&raquo;(3)<br />بر این اساس و با توجه به وضعیت امنیتی کشور و کنترول وضعیت و آوردن اصلاحات در نظام و خواست و آرزوهای مردم، رئیس&zwnj;جمهور غنی در یک ماه گذشته با اقشار مختلف جامعه دیدار نموده که این دیدارها راجع به شامل ساختن اراده مردم به این روند،ادامه دارد. علاوه بر این با فعالین جامعه مدنی، استادان پوهنتون، احزاب سیاسی، زنان، علما و اقشار مختلف جامعه دیدار صورت گرفته است و در مورد امنیت، اقتصاد، سیاست و دیگر مسایل مشوره شده است.<br />به باور رئیس&zwnj;جمهورغنی، وقتی مسایل با مردم شریک شود و حکومت در یک چوکات مشخص و منظم&nbsp; از اقداماتش به مردم معلومات دهد، راه&zwnj;حل مناسب مشکلات پیدا شده و فاصله میان حکومت و مردم از بین می&zwnj;رود. علاوه بر این، در عملی ساختن پروگرام&zwnj;ها و برنامه&zwnj;ها نیز از مردم نظر و مشوره گرفته می&zwnj;شود که این یک اصل مهم و مفید است.(4)<br /><br />نتیجه<br />با توجه به آنچه گفته شد به روشنی معلوم می&zwnj;گردد که رئیس&zwnj;جمهور غنی تلاش دارد که فاصله میان حکومت و مردم از بین رفته و به قسم عملی، منبع قدرت به مردم سپرده شود. در دموکراسی، مشوره کردن با مردم در مسایل مختلف و ملی و پاسخگو بودن حکومت به مردم یک اصل است. همکاری مردم و شامل ساختن آنان در اداره و قدرت یک اصل مهم شمرده می&zwnj;شود.<br />از این مسایل به خوبی روشن می&zwnj;گردد، وقتی که مردم شامل اداره شوند، به رئیس&zwnj;جمهور نه به چشم بادار بلکه به حیث خدمتگار می&zwnj;بینند.<br />ما در حال حاضر ضمن حمایت جامعه جهانی در بخش&zwnj;های سیاسی، امنیتی و اقتصادی، بنا به گفته رئیس&zwnj;جمهور با 20 گروه تروریستی عملا در جنگ هستیم و آنها تلاش می&zwnj;کنند که همه چیز ما را گرفته و بار دیگر آتش جنگ را در کشور ما شعله&zwnj;ور سازند. آنان می&zwnj;خواهند مانع پیشرفت کشور ما شده و حکومت را ضعیف بسازند. در این برهه، لازم است که ما یک مشت محکم شویم و به صورت مشترک با پیدا کردن راه حل مشکلات&zwnj;مان را مهار نماییم.<br />در ادامه، برنامه جوان&zwnj;سازی اداره افغانستان و به&zwnj;خصوص مشوره با جوانان در حکومتداری، می&zwnj;تواند راهی را به پیشرفت باز کند و با این اساس، می&zwnj;توان همکاری و پشتیبانی مردم در اصلاحات را به دست آورد.<br /><br />منبع:&zwnj;<br />۱ـ منشور تیم تحول و تداوم ، ۱۳۹۲، ص 10.<br />۲ـ&nbsp; منشور تیم تحول و تداوم، 1392، ص ۱۲.<br />۳ـ منشور تیم تحول و تداوم، ۱۳۹۲، ص ۱۰۰.<br />۴ـ&nbsp;&nbsp;<a href=\"http://ocs.gov.af/dari/3526/\">http://ocs.gov.af/dari/3526/</a></p>', NULL, '16.jpg', 'article', ','),
(17, NULL, 'حکومت و مدیریت منابع آبی کشور', NULL, NULL, '1396 - 08 - 11', NULL, NULL, 'بر اساس آمارهای اخیر بانک جهانی، 44 درصد نیروی کار کشور، در سکتور زراعت مصروف هستند و عواید 60 درصد از خانواده‌ها نیز از طریق همین سکتور تمویل می‌گردد.', NULL, NULL, '<p>بر اساس آمارهای اخیر بانک جهانی، 44 درصد نیروی کار کشور، در سکتور زراعت مصروف هستند و عواید 60 درصد از خانواده&zwnj;ها نیز از طریق همین سکتور تمویل می&zwnj;گردد. رشد زراعت، سالانه تا 1.2 درصد در رشد اقتصادی کشور نقش دارد و همچنین می&zwnj;تواند در یک بازه زمانی میان&zwnj;مدت (حدود یک دهه) 1.2 میلیون شغل ایجاد کند. بنابراین، افغانستان کشوری&zwnj; است که بخش اصلی اقتصاد آن به محصولات و تولیدات زراعتی متکی است؛ بخشی که فعال بودن آن نیاز شدید به مدیریت آب&zwnj;های کشور دارد.</p>\r\n<p>حکومت با درکِ این مهم، در تلاش است که با تعیین یک چارچوب منظم کاری، آب&zwnj;های جاری و زیرزمینی کشور را به منظور رشد زراعت، تقویت صنایع و تولید انرژی برق به گونه مؤثر و مفید مدیریت کند.</p>\r\n<p>اهمیت آب و &nbsp;زمین در افغانستان</p>\r\n<p>تخمین زده می&zwnj;شود که میزان بارندگی سالانه در افغانستان 163 میلیارد مترمکعب است که از این جمع، 57 میلیارد آن آب&zwnj;های جاری، 18 میلیارد مترمکعب آن آب&zwnj;های ذخایر زیرزمینی، و باقی آن به گونه&zwnj;های دیگر، ذخیره، جذب و یا تبخیر می&zwnj;گردد.</p>\r\n<p>افغانستان دارای ۲۵ رودخانه بزرگ، صدها رودخانه کوچک و هزاران جوی و قله&zwnj;های پوشیده از برف می&zwnj;باشد که یک ثروت بی&zwnj;بدیل به حساب می&zwnj;رود؛ اما هم&zwnj;اکنون قادر است تنها 20 میلیارد از 75 میلیارد مترمکعب آب&zwnj;های قابل دسترس را استفاده نماید.</p>\r\n<p>افغانستان، کشور متکی به اقتصاد زراعتی است و حدود هشتاد درصد شهروندانش به زراعت و مالداری مشغول هستند. بر اساس گزارش&zwnj;ها، ۳۱ درصد درآمد ملی کشور از محصولات زراعتی به دست می&zwnj;آید. میزان زمین&zwnj;های قابل کشت ما، بیش از 9 میلیون هکتار است که از این جمع تنها ۴ میلیون هکتار آن تحت کشت قرار دارد.</p>\r\n<p>افزایش روزافزون نفوس و نیاز رونق زراعت در کشور، حکومت را ملزم می&zwnj;سازد که اراضی و منابع آبی کشور را به گونه درست و مؤثر مدیریت کند.</p>\r\n<p>از سوی دیگر، توسعه اقتصادی وابسته به توسعه انسانی است و توسعه انسانی بدون دسترسی به آب آشامیدنی صحی ناممکن است. به همین دلیل، تلاش&zwnj;های وسیعی در حکومت جریان دارد تا میزان و سطوح دسترسی شهروندان به آب آشامیدنی صحی افزایش و گسترش پیدا کند.</p>\r\n<p>حکومت و مدیریت منابع آبی</p>\r\n<p>حکومت وحدت ملی از شروع کار تا به حال، جهت مدیریت آب و تبدیل کردن این ثروت حیاتی به سرمایه، هم در بخش تدوین مقرره&zwnj;ها و پالیسی&zwnj;سازی و هم در بخش مطالعات تخنیکی و اجرایی، گام&zwnj;های بزرگی برداشته است. در این راستا علاوه بر وزارت انرژی و آب، وزارت&zwnj;های احیا و انکشاف دهات و &nbsp;زراعت و آبیاری نیز در بخش مدیریت آب&zwnj;ها جهت فراهم کردن آب مناسب و کافی آشامیدنی و زراعتی در قریه و قصبه&zwnj;های کشور، فعالیت&zwnj;های درخور توجهی انجام داده&zwnj;اند.</p>\r\n<p>الف &ndash; جایگاه مدیریت آبی در حکومت:</p>\r\n<p>حکومت وحدت ملی، به مسأله آب به عنوان یک ثروت اساسی کشور می&zwnj;نگرد و در خطوط و استراتیژی کاری آن، مدیریت &nbsp;منابع زیرزمینی آب و مهار آب&zwnj;های جاری کشور از فوریت و اولویت بالایی برخوردار می&zwnj;باشد. زیرا از طریق مهار و مدیریت آب&zwnj;های کشور می&zwnj;توان در راستای رشد پایدار و متوازن داخلی و همچنین استفاده مناسب کشورهای مشترک&zwnj;المنافع در حوزه آبی استفاده کرد.&nbsp;</p>\r\n<p>محمد اشرف غنی، رئیس جمهوری اسلامی افغانستان، در نشست&zwnj;های مربوط به رشد اقتصادی و توسعه انسانی افغانستان، همواره به مسأله آب و نقش حیاتی آن اشاره کرده و لزوم توجه جدی به آن را خاطرنشان ساخته است. به دلیل اهمیت موضوع آب&zwnj;های کشور، حکومت وحدت ملی &nbsp;در سال 1394 &laquo;شورای عالی اراضی و آب&raquo; را تحت نظر رئیس&zwnj;جمهور تأسیس کرد که تاکنون نشست&zwnj;های متعددی برگزار و تصامیم لازم در مورد مدیریت زمین و آب&zwnj;های کشور اتخاذ کرده است.</p>\r\n<p>ب &ndash; برنامه&zwnj;ریزی و تدوین پالیسی</p>\r\n<p>در راستای مدیریت و بهره&zwnj;برداری از این ثروت حیاتی، استراتیژی سکتور آب کشور تدوین شده که در راستای آن، کار مطالعات تخنیکی، دیزاین تفصیلی و ساختمان 32 پروژه&zwnj; ذخایر آب، روی دست می&zwnj;باشد و در کنار آنها، پروژه&zwnj;های کلان و خُرد دیگری که آب آشامیدنی صحی، کشاورزی و تولید انرژی برق را فراهم می&zwnj;سازد، توسط نهادهای دیگر حکومت در حال کار می&zwnj;باشد. این پروژه&zwnj;ها در بازه&zwnj;های زمانی کوتاه&zwnj;مدت، میان&zwnj;مدت و درازمدت نتایج محسوسی خواهند داشت.</p>\r\n<p>افغانستان در طی یک و نیم دهه اخیر، امکان&zwnj;سنجی و مفیدبودن حدود ۱۱۱ بند آبی را &nbsp;تحت مطالعه قرار داده است که برخی از آنها تکمیل شده و برخی نیز تحت کار قرار دارد.</p>\r\n<p>حکومت افغانستان از طریق راه&zwnj;اندازی برنامه ملی انکشاف منابع آب به منظور احداث پروژه&zwnj;های انکشافی بندهای ذخیره آب، برنامه ملی بازسازی و اصلاح تأسیسات آب به منظور بازسازی سربندها و کانال&zwnj;ها، و برنامه تحکیم سواحل دریاهای کشور در تلاش است که در راستای مدیریت منابع آبی و جلوگیری از مشکلات ناشی از فقدان مدیریت در این حوزه، گام&zwnj;های اساسی را بردارد.</p>\r\n<p>ج &ndash; اقدامات و فعالیت&zwnj;ها</p>\r\n<p>حکومت افغانستان برای انجام مطالعات، فعالیت&zwnj;ها و کارهای بیش&zwnj;تر و بهتر جهت مدیریت آب در بخش ذیل گام&zwnj;های اساسی برداشته است:</p>\r\n<p>1.تعیین و تقسیم حوزه&zwnj;های آبی کشور:</p>\r\n<p>برای مدیریت بهتر و بیش&zwnj;تر منابع آبی کشور، دولت منابع موجود را به پنج حوزه آبی ذیل تقسیم کرده است:</p>\r\n<p>- حوزه رود آمو (واخان، کوکچه، کندز، اندراب و خنجان)</p>\r\n<p>- حوزه رود شمال (بلخاب و سرپل)</p>\r\n<p>- حوزه رود غربی (هریرود، مرغاب، شرین تگاب، کشک، ادرسکن، کوشان، قیصار، گلران و خاشرود)</p>\r\n<p>- حوزه هلمند: (ارغنداب، غزنی، ترنگ، ارغستان و موسی قلعه)</p>\r\n<p>- حوزه کابل: (گل&zwnj;بهار، پنجشیر، کابل، لوگر، کنر، علی شنگ و علینگار)</p>\r\n<p>2.ساخت بندهای آب&zwnj;گردان:</p>\r\n<p>کار تدارکات 32 بند ذخیره آب به ارزش حدود 2.33 میلیارد دالر طی سال گذشته آغاز شده که شامل مطالعات تخنیکی، دیزاین تفصیلی و ساختمانی شده&zwnj;اند. پس از بهره&zwnj;&zwnj;برداری از این ذخایر، افغانستان قادر است نتایج ذیل را به دست آورد:</p>\r\n<p>-آبیاری بیش از 366 هزار هکتار زمین؛</p>\r\n<p>-بهبود آبیاری بیش از 230 هزار هکتار زمین؛</p>\r\n<p>-ذخیره بیش از 20.3 میلیون مترمکعب آب؛</p>\r\n<p>که برای صدها هزار فامیل ایجاد عواید و برای هزاران شهروند ایجاد کار می&zwnj;کند. همچنین باعث بهبود و افزایش عواید داخلی و کاهش قابل ملاحظه&zwnj;ی میزان فقر در کشور خواهد شد.</p>\r\n<p>&nbsp;</p>\r\n<p>ه&zwj;: دستاوردها:&nbsp;</p>\r\n<p>برای رسیدن به اهداف تعیین&zwnj;شده،گام&zwnj;های اساسی در سال&zwnj;های 1394 و 1395 برداشته شده و در سال 1396 نیز طرح&zwnj;ها و فعالیت&zwnj;های خوبی در حال اجرا می&zwnj;باشد که از جمله به موارد زیر اشاره می&zwnj;گردد:</p>\r\n<p>-آغاز روند نصب استیشن&zwnj;های هایدرومیتیورولوجیکی، میتیورولوجیکی و برف&zwnj;سنج در سراسر کشور جهت اخذ ارقام؛</p>\r\n<p>-تهیه نقشه&zwnj;های هایدرولوجیکی سراسر کشور؛</p>\r\n<p>-اعمار و یا بازسازی ده&zwnj;ها کانال، سربند و &nbsp;پروژه&zwnj;های تحکیم سواحل دریاها جهت جلوگیری از ضایعات و استفاده مؤثر از آب؛</p>\r\n<p>-آغاز کار ماسترپلان در پنج حوزه دریایی؛</p>\r\n<p>-احیاى 1953 کیلومتر زیرساخت&zwnj;هاى آبیارى در پنج حوزه آبی کشور که منجر به افزایش قابل ملاحظه آب براى آبیارى بیش&zwnj;تر از 5200 هزار هکتار زمین زراعتى شده است؛</p>\r\n<p>-تکمیل دیزاین پروژه گیمبری ولایت ننگرهار به منظور آبیاری 35 هزار هکتار زمین زراعتی؛</p>\r\n<p>-نهایی شدن سند مبانی دیپلوماسی آب جمهوری اسلامی افغانستان؛</p>\r\n<p>-طرح و ترتیب مسوده پالیسی آب&zwnj;های فرامرزی؛</p>\r\n<p>-ترتیب مسوده پالیسی آب&zwnj;های زیرزمینی؛</p>\r\n<p>-ترتیب مسوده پالیسی و استراتیژی ظرفیت&zwnj;سازی سکتور آب؛</p>\r\n<p>-ترتیب پالیسی اداره یا مدیریت منابع آب؛</p>\r\n<p>-ترتیب مسوده مقرره بستر و حریم منابع آب و تأسیسات آبی؛</p>\r\n<p>-طرح ایجاد اداره تحکیم سواحل دریای آمو؛</p>\r\n<p>-طرح احیا و بازسازی کاریزها.</p>', NULL, '17.jpg', 'article', ','),
(18, NULL, 'روند صلح اجتماعی به رهبری زنان از طریق کمیته‌های ولایتی عملی می‌شود', NULL, NULL, '1396 - 08 - 11', NULL, NULL, 'در جلسه‌ای با حضور خانم اول محترمه بی‌بی‌گل غنی و محترمه حبیبه سرابی عضو شورای عالی صلح و اشتراک فعالین زن در  عرصه صلح، ضمن ایجاد تعدادی از کمیته‌های ولایتی روند صلح اجتماعی به رهبری زنان، اهداف و فعالیت‌های این کمیته‌ها تشریح شد.', NULL, NULL, '<p style=\"text-align: right;\">در جلسه&zwnj;ای با حضور خانم اول محترمه بی&zwnj;بی&zwnj;گل غنی و محترمه حبیبه سرابی عضو شورای عالی صلح و اشتراک فعالین زن در&nbsp; عرصه صلح، ضمن ایجاد تعدادی از کمیته&zwnj;های ولایتی روند صلح اجتماعی به رهبری زنان، اهداف و فعالیت&zwnj;های این کمیته&zwnj;ها تشریح شد.</p>\r\n<p style=\"text-align: right;\">خانم اول در این نشست با ایراد سخنرانی ضمن اشاره به باورمندی به توانایی و فعالیت زنان در کشور، بر ایفای نقش فعال آنان در تأمین صلح از طریق پرداختن به پروسه صلح اجتماعی مطابق قطع&zwnj;نامه چهارمین سمپوزیم زنان افغان تحت عنوان &laquo;زنان افغان پیام&zwnj;آوران صلح&raquo; تأکید نمود.</p>\r\n<p style=\"text-align: right;\">خانم اول گفت که کشور ما در حالت جنگ، نیاز شدید به تأمین صلح دارد؛ بنابراین همه ما باید نقش فعالی در این پروسه داشته و راه&zwnj;حل&zwnj;ها و مسیر تفاهم را جست&zwnj;وجو نماییم.</p>\r\n<p style=\"text-align: right;\">وی افزود که زنان در تربیت اطفال و از طریق آن در پرورش روحیه صلح و آشتی در جامعه، نقش بنیادی دارند.</p>\r\n<p style=\"text-align: right;\">خانم اول از زنان خواست که با درک مسؤولیت، بر پا ایستاده و از هیچ نوع سعی و تلاشی دریغ نورزند.</p>\r\n<p style=\"text-align: right;\">در این جلسه بر فعالیت در راستای صلح اجتماعی به رهبری زنان به سطوح کمیته&zwnj;ها و هماهنگی بین آنها تأکید شد.</p>\r\n<p style=\"text-align: right;\">طبق فیصله&zwnj;ی قطع&zwnj;نامه چهارمین سمپوزیم زنان افغان، کمیته&zwnj;های ولایات کابل، لوگر، میدان&zwnj;وردک و پروان در این نشست ایجاد شدند.</p>\r\n<p style=\"text-align: right;\">قابل ذکر است که کمیته&zwnj;های ولایات ننگرهار، لغمان، نورستان، کنر و هرات قبلاً طی سفر مشاورین دفتر خانم اول به این ولایات ایجاد شده بودند و کمیته&zwnj;های سایر ولایات نیز در آینده نزدیک ایجاد می&zwnj;گردند.</p>\r\n<p style=\"text-align: right;\">این کمیته&zwnj;ها با هدف ترویج ذهنیت مسؤولیت&zwnj;پذیری شهروندی در قبال صلح اجتماعی، در چارچوب پلان عمل تدوین&zwnj;شده، 31 فعالیت را عملی خواهند نمود.</p>\r\n<p style=\"text-align: right;\">فعالیت&zwnj;های پلان عمل شامل مواردی چون همکاری با ارگان&zwnj;های امنیتی، ایفای نقش سفیران صلح، دادخواهی، آگاهی&zwnj;دهی، جلوگیری از پیوستن افراد به گروه&zwnj;های مخالف، حمایت از زنان پولیس و اردوی ملی، الگوسازی برای اطفال و جوانان و... می&zwnj;باشد.</p>\r\n<p style=\"text-align: right;\">چهارمین سمپوزیم زنان افغان تحت عنوان &laquo;زنان افغان پیام&zwnj;آوران صلح&raquo; توسط دفتر خانم اول به تاریخ 25 الی 27 ثور 1396 در کابل تدویر یافته بود که با صدور قطع&zwnj;نامه شش ماده&zwnj;یی پایان یافت.</p>', NULL, '18.jpg', 'news', ','),
(19, NULL, 'تعهدات برنامه عمل ملی مشارکت دولتداری باز کشور تصویب شد', NULL, NULL, '1396 - 08 - 11', NULL, NULL, 'نخستین نشست مجمع عمومی مجتمع مشارکت دولتداری باز افغانستان به ریاست عبدالسبحان رؤوف معاون پالیسی، نظارت، و بررسی ریاست عمومی دفتر مقام عالی ریاست جمهوری و رئیس مجتمع مشارکت دولتداری', NULL, NULL, '<p style=\"text-align: right;\">نخستین نشست مجمع عمومی مجتمع مشارکت دولتداری باز افغانستان به ریاست عبدالسبحان رؤوف معاون پالیسی، نظارت، و بررسی ریاست عمومی دفتر مقام عالی ریاست جمهوری و رئیس مجتمع مشارکت دولتداری باز افغانستان برگزار و 1+10 تعهد برنامه عمل ملی مشارکت دولتداری باز افغانستان در آن تصویب شد.</p>\r\n<p style=\"text-align: right;\">در این جلسه مجمع عمومی، معینان پلان و پالیسی وزارت&zwnj;ها و اداره&zwnj;های مستقل دولتی و دیگر ارگان&zwnj;های ذی&zwnj;ربط و نهادهای مدنی و خصوصی، روی 14 تعهد ارائه&zwnj;شده برای گنجانیدن در برنامه عمل ملی، یک به یک بحث نمودند و در نهایت 1+10 تعهد را به تصویب رساندند.</p>\r\n<p style=\"text-align: right;\">پیش&zwnj;تر چندین نشست میان نهادهای جامعه مدنی و رئیسان پلان و پالیسی وزارت&zwnj;ها و اداره&zwnj;های مستقل دولتی به منظور تدوین برنامه عمل ملی برگزار شده بود که در نتیجه بیش از 24 تعهد برای شامل&zwnj;سازی در برنامه عمل ملی پیشنهاد شد. پس از آن، در نشست سه&zwnj;روزه مجتمع مشارکت دولتداری باز افغانستان (22 &ndash; 24 میزان 1396) از مجموع تعهدات ارائه&zwnj;شده و پیشنهادی جدید، 14 تعهد غرض تصویب در مجمع عمومی تأیید شد.</p>\r\n<p style=\"text-align: right;\">در جلسه مجمع عمومی معینان پلان و پالیسی وزارت&zwnj;ها و اداره&zwnj;های تعهدکننده درباره تعهدات معلومات ارائه کرده و به سؤال&zwnj;ها پاسخ دادند. سرانجام 1+10 تعهد در مجمع عمومی تصویب شد که شامل موارد ذیل می&zwnj;باشد:</p>\r\n<p style=\"text-align: right;\">1. بازنگری و تطبیق میکانیزم مشارکت عامه در روند بررسی؛&nbsp;</p>\r\n<p style=\"text-align: right;\">2. بازنگری قانون طرز طی مراحل، نشر و انفاذ اسناد تقنینی؛</p>\r\n<p style=\"text-align: right;\">3. ایجاد محاکم اختصاصی رسیدگی به جرایم خشونت علیه زنان در دوازده ولایت؛</p>\r\n<p style=\"text-align: right;\">4. توسعه شوراهای مشارکت پولیس و مردم؛</p>\r\n<p style=\"text-align: right;\">5 . تدوین طرح ایجاد سازمان اعتباردهی عرضه خدمات صحی در کشور و تطبیق آن؛</p>\r\n<p style=\"text-align: right;\">6. تدوین پالیسی ملی بهسازی و احیای شهری؛</p>\r\n<p style=\"text-align: right;\">7. ثبت، نشر و تدقیق دارایی&zwnj;های 100 مقام عالی&zwnj;رتبه دولتی؛</p>\r\n<p style=\"text-align: right;\">8. ایجاد کمیته مشترک نهادهای دولتی و جامعه مدنی برای نظارت از اجرای استراتیژی مبارزه با فساد اداری؛</p>\r\n<p style=\"text-align: right;\">9. تدوین طرح نظارت جامعه مدنی بر کیفیت و شفافیت تعلیم و تحصیل؛</p>\r\n<p style=\"text-align: right;\">10. تدوین طرحی برای محافظت از زنان در شرایط جنگ و حالات اضطرار؛ و</p>\r\n<p style=\"text-align: right;\">11. تدوین مکانیزم تقویت واحدهای دسترسی به اطلاعات در 59 اداره دولتی (تعهد اضافه)؛</p>\r\n<p style=\"text-align: right;\">این تعهدات پس از تصویب کابینه دولت جمهوری اسلامی افغانستان شامل اولین برنامه عمل ملی مشارکت دولتداری باز کشور می&zwnj;شود و در مدت دو سال اجرا می&zwnj;گردد.</p>', NULL, '19.jpg', 'news', ',');

-- --------------------------------------------------------

--
-- Table structure for table `media_directorate`
--

CREATE TABLE `media_directorate` (
  `id` int(11) NOT NULL,
  `description_en` text NOT NULL,
  `description_dr` text CHARACTER SET utf32 COLLATE utf32_persian_ci NOT NULL,
  `description_pa` text CHARACTER SET utf32 COLLATE utf32_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `media_registeration`
--

CREATE TABLE `media_registeration` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `license_number` varchar(100) NOT NULL,
  `license_date` varchar(20) NOT NULL,
  `starting_date` varchar(20) NOT NULL,
  `type` enum('television','radio','printing_media','news_agency','electronic_media','others') NOT NULL,
  `coverage_area` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `coverage_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `recipent_group` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `broadcasting_language` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `email1` varchar(30) NOT NULL,
  `email2` varchar(30) NOT NULL,
  `email3` varchar(30) NOT NULL,
  `phone1` varchar(12) NOT NULL,
  `phone2` varchar(12) NOT NULL,
  `phone3` varchar(12) NOT NULL,
  `website` varchar(20) NOT NULL,
  `facebook` varchar(20) NOT NULL,
  `twitter` varchar(20) NOT NULL,
  `media_manager` int(11) NOT NULL,
  `reporter` int(11) DEFAULT NULL,
  `journalist1` int(11) NOT NULL,
  `journalist2` int(11) NOT NULL,
  `secretary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `media_staff`
--

CREATE TABLE `media_staff` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(20) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `facebook` varchar(20) NOT NULL,
  `twitter` varchar(20) NOT NULL,
  `type` enum('manager','reporter','journalist','secretary') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ocs`
--

CREATE TABLE `ocs` (
  `id` int(11) NOT NULL,
  `description_en` text NOT NULL,
  `description_dr` text CHARACTER SET utf32 COLLATE utf32_persian_ci NOT NULL,
  `description_pa` text CHARACTER SET utf32 COLLATE utf32_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `president`
--

CREATE TABLE `president` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_dr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_pa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_en` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_dr` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_pa` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc_en` text COLLATE utf8mb4_unicode_ci,
  `short_desc_dr` text COLLATE utf8mb4_unicode_ci,
  `short_desc_pa` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_dr` text COLLATE utf8mb4_unicode_ci,
  `description_pa` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('decree','order','statement','message','word') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `president`
--

INSERT INTO `president` (`id`, `title_en`, `title_dr`, `title_pa`, `date_en`, `date_dr`, `date_pa`, `short_desc_en`, `short_desc_dr`, `short_desc_pa`, `description_en`, `description_dr`, `description_pa`, `image`, `type`) VALUES
(5, NULL, 'فرمان رئیس جمهوری اسلامی افغانستان در مورد تقرر حفیظ الله ولی رحیمی بحیث رئیس عمومی تربیت بدنی و سپورت', NULL, NULL, '1396 - 08 - 11', NULL, NULL, 'بتأسی از حکم فقره (۱۳) ماده شصت و چهارم قانون اساسی افغانستان، تقرر محترم حفیظ الله ولی رحیمی را، در بست خارج رتبه، به حیث رئیس عمومی تربیت بدنی و سپورت، منظور می نمایم.', NULL, NULL, '<p>&nbsp;بتأسی از حکم فقره (۱۳) ماده شصت و چهارم قانون اساسی افغانستان، تقرر محترم حفیظ الله ولی رحیمی را، در بست خارج رتبه، به حیث رئیس عمومی تربیت بدنی و سپورت، منظور می نمایم.&nbsp;&nbsp;</p>\r\n<p>از خداوند متعال توفیقات مزید شانرا، در اجرای وظایف محوله استدعا میدارم.</p>\r\n<p>محمد اشرف غنی</p>\r\n<p>رئیس جمهوری اسلامی افغانستان</p>', NULL, NULL, 'decree'),
(6, NULL, 'فرمان رئیس جمهوری اسلامی افغانستان در مورد ارتقای بست ریاست عمومی اداره تدارکات ملی و تقرر رئیس آن اداره', NULL, NULL, '1396 - 08 - 11', NULL, NULL, 'به تأسی از فقره (۱۳) ماده (۶۴) قانون اساسی افغانستان، ارتقای بست ریاست عمومی اداره تدارکات ملی از مافوق رتبه به خارج رتبه و تقرر الهام عمر هوتکی بحیث رئیس عمومی اداره تدارکات ملی، در بست خارج رتبه، منظور است.', NULL, NULL, '<p>به تأسی از فقره (۱۳) ماده (۶۴) قانون اساسی افغانستان، ارتقای بست ریاست عمومی اداره تدارکات ملی از مافوق رتبه به خارج رتبه و تقرر الهام عمر هوتکی بحیث رئیس عمومی اداره تدارکات ملی، در بست خارج رتبه، منظور است.</p>\r\n<p>از خداوند متعال (ج) توفیقات مزید در اجرای امور محوله برای شان استدعا می نمایم.</p>\r\n<p>محمد اشرف غنی</p>\r\n<p>رئیس جمهوری اسلامی افغانستان</p>', NULL, NULL, 'decree'),
(7, NULL, 'حكم رئیس جمهوری اسلامی افغانستان در مورد تدویر انتخابات کمیته ملی المپیک', NULL, NULL, '1396 - 08 - 11', NULL, NULL, 'به منظور جلوگيری از خلای مديريتی و به منظور جلوگیری از موجودیت نهاد های موازی کمیته ملی المپیک مراتب آتی هدایت داده می شود:', NULL, NULL, '<p>&nbsp;به منظور جلوگيری از خلای مديريتی و به منظور جلوگیری از موجودیت نهاد های موازی کمیته ملی المپیک مراتب آتی هدایت داده می شود:</p>\r\n<p>ماده اول:</p>\r\n<p>کمیته ملی المپیک موظف است تا در اسرع وقت ممکنه و در هماهنگی مطابق منشور کمیته المپیک آسیایی و جهانی، اساسنامه، اسناد و مقررات داخلی و ریاست عمومی تربیت بدنی و سپورت جهت انتخاب رئیس جدید آن کمیته انتخابات را دایر نمایند.</p>\r\n<p>ماده دوم:</p>\r\n<p>هيئتی که منافی با اساسنامه و منشور كميته المپيک جهانی نباشد برای زمينه سازی تغييرات و اجراي انتخابات تحت نظر کميته المپيک جهانی بصورت شفاف و اصولی تعين شود</p>\r\n<p>ماده سوم:</p>\r\n<p>نهاد های موازی کمیته ملی المپیک با صدور این حکم ملغی دانسته می شود وهر نوع انتخاباتی که قبلا بدون نظارت بين المللي انجام شده باشد از اعتبار ساقط است.</p>\r\n<p>&nbsp;</p>\r\n<p>محمد اشرف غنی</p>\r\n<p>رئیس جمهوری اسلامی افغانستان</p>', NULL, NULL, 'order'),
(8, NULL, 'ترجمه سخنرانی رئیس‌جمهور محمد اشرف غنی در بیستمین نشست بورد مشترک هماهنگی نظارت (JCMB)', NULL, NULL, '1396 - 08 - 11', NULL, NULL, 'به نام خداوند بخشاینده مهربان.\r\n\r\nآقای حکیمی وزیر مالیه، آقای یاماموتو نماینده خاص سکرترجنرال سازمان ملل متحد برای افغانستان، لوی‌سارنوال حمیدی، اعضای کابینه، سفرای برجسته، نمایندگان محترم، والیان، اعضای جامعه مدنی، فعالان [حقوق] زن، دوستان و هموطنان.', NULL, NULL, '<p>به نام خداوند بخشاینده مهربان.</p>\r\n<p>آقای حکیمی وزیر مالیه، آقای یاماموتو نماینده خاص سکرترجنرال سازمان ملل متحد برای افغانستان، لوی&zwnj;سارنوال حمیدی، اعضای کابینه، سفرای برجسته، نمایندگان محترم، والیان، اعضای جامعه مدنی، فعالان [حقوق] زن، دوستان و هموطنان.</p>\r\n<p>بی&zwnj;نهایت خرسندم که شما را به نشست بورد مشترک نظارت و هماهنگی (JCMB) خوش&zwnj;آمدید گفته و از شما به خاطر همدلی و تعهدتان ابراز امتنان می&zwnj;نمایم. شما به شهری آمده&zwnj;اید که عزادار است. کابل هنوز هم در غم از دست دادن هموطنان&zwnj;مان ماتم گرفته است. حمله شنیع دهم جوزا تنها حمله به شهروندان صلح&zwnj;دوست کابل نه، بلکه حمله بر اصول پذیرفته&zwnj;شده، کنوانسیون&zwnj;ها، معاهدات و فرهنگ&zwnj;های حاکم بر دیپلوماسی جهانی بود؛ و اگر شجاعت هفت تن از افسران افغان نمی&zwnj;بود، این حمله می&zwnj;توانست جان&zwnj;های بیش&zwnj;تری از جمله همکاران بین&zwnj;المللی&zwnj;مان را بگیرد.</p>\r\n<p>اما چه افرادی در انجام چنین اعمال جنایتکارانه، وحشیانه و نامشروع دخیل&zwnj;اند؟ چه کسی می&zwnj;تواند اعمال ترور اینچنینی را حمایت کند؟ چگونه می&zwnj;توان به آنها پناهگاه داد و از آنان حمایت کرد؟ چه نوع بدگمانی و بی&zwnj;تفاوتی نسبت به جامعه جهانی مشمول کشورهای مطیع قانون، به سازمان&zwnj;های جنایتکار این فرصت را می&zwnj;دهد که با تکیه بر ابزارهای سیاسی، عمداً غیرنظامیان را هدف قرار داده، به قتل برسانند و قربانیان بی&zwnj;گناهی را رقم بزنند که تنها جرم&zwnj;شان این بود که افغان&zwnj;هایی ساده&zwnj;اند و برای تهیه غذای خانواده&zwnj;های&zwnj;شان و تربیت فرزندان خود کار می&zwnj;کنند؟ شما در جامعه جهانی، و ما این جا در افغانستان؛ همه ما با تحمل دردهای بسیار آموخته&zwnj;ایم که وقتی به تروریزم اجازه داده شود، و حتی تشویق به رشد گردد، تروریست&zwnj;ها به سرعت در مبارزه با حامیان خود قرار گرفته و تخریب&zwnj;شان را به فراتر از مرزهای هر کشور و یا مردمی، گسترش خواهند داد.</p>\r\n<p>به صورت عموم افغان&zwnj;ها و به صورت خاص شهروندان کابل دارای روحیه&zwnj;ای انعطاف&zwnj;پذیر و بااراده هستند. ما در حال بازیافتن (وضعیت) هستیم. هفته گذشته، از دو مکتب نزدیک به محل حمله بازدید کردم. علایم فزیکی تخریب در همه جا بود؛ اما همه اطفال کوچک، مرا مطمئن ساختند که کابوس&zwnj;های&zwnj;شان متوقف شده است. زمانی که پرسیدم چند نفر می&zwnj;خواهند یک روز رئیس&zwnj;جمهور شوند، بیش از نیمی از آنان دست&zwnj;شان را بالا بردند. اطفال بر کابوس&zwnj;ها غالب شده&zwnj;اند، اما بزرگسالان هنوز با آنها زندگی می&zwnj;کنند. ما باید کارهای زیادی انجام بدهیم تا به کابوس&zwnj;های بزرگسالان و جوانان ما نقطه پایان بگذاریم.</p>\r\n<p>روحیه استوار ما، با نوع مشارکتی که شما همکاران بین&zwnj;المللی ما نشان داده&zwnj;اید، تقویت یافته است.</p>\r\n<p>نخست؛ شما متحدانه در کنار ما ایستادید تا کنفرانس کابل را تدویر نموده و پروسه کابل را احیا نماییم. ما در پی صلح، متحدانه ایستاده&zwnj;ایم، زیرا صلح نخستین اولویت شهروندان افغانستان می&zwnj;باشد.</p>\r\n<p>دوم؛ شما در پیروی از نورم&zwnj;های بین&zwnj;المللی رفتاری که جوامع متمدن را به یکدیگر پیوند می&zwnj;دهد، متفق&zwnj;القول و صریح بوده&zwnj;اید.</p>\r\n<p>سوم؛ شما قدرت پایداری&zwnj;تان را نشان دادید. می&zwnj;خواهم از هر عضو جامعه بین&zwnj;المللی، دیپلومات&zwnj;ها، متخصصان انکشاف و فعالان جامعه مدنی به خاطر همدلی، غم&zwnj;شریکی و انعطاف&zwnj;پذیری&zwnj;تان سپاس&zwnj;گزاری کنم. شما حق کامل را به خاطر این که شهروند کابل محسوب شوید به دست آورده&zwnj;اید و من به عنوان یک کابلی، از پیوستن شما به جامعه کابل استقبال می&zwnj;کنم.</p>\r\n<p>شما در مورد امنیت&zwnj;تان، نگرانی&zwnj;های بجا دارید. من به نمایندگی از شهروندان کابل می&zwnj;گویم که تأمین امنیت شما در صدر اولویت&zwnj;های ما قرار دارد. ما قبلاً اقدامات جدید امنیتی را روی دست گرفته&zwnj;ایم. طی هفته&zwnj;های آینده، ما با بازرسی دقیق&zwnj;تر، کنترول بهتر ترافیک به خاطر نظارت خوب&zwnj;تر و جلوگیری از نفوذ (دشمن)، آموزش نیروهای امنیتی و استخباراتی که در کابل فعالیت دارند، در صدد افزایش امنیت در شهر کابل هستیم. انجام این اقدامات در ماه&zwnj;های اول دشوار خواهد بود، به همین دلیل از شهروندان کابل می&zwnj;خواهم که به خاطر تأمین امنیت شهر کابل، شش ماه به حکومت وحدت ملی مهلت دهند. در عین حال ما نیاز به استخبارات بهتر و ایستادگی بیش&zwnj;تر شهروندان داریم که به خاطر توقف تروریست&zwnj;ها برای ورود به این شهر بسیج شوند.</p>\r\n<p>مشاوره&zwnj;های من با بیش از هفت هزار شهروند کابل، ناامیدی عمیق همراه آشفتگی آنان و همچنین اجماع&zwnj;شان روی نیاز به اصلاحات کلیدی در بخش امنیت و انکشاف را نشان می&zwnj;داد. مردم نیازمند کار هستند. در نبود شغل و کار، مجموعه نامحدودی از همدستان و حمله&zwnj;کنند&zwnj;گان انتحاری، آماده می&zwnj;گردند که به این گروه&zwnj;ها بپیوندند که به&zwnj;خوبی از لحاظ مالی تأمین می&rlm;شوند.</p>\r\n<p>&nbsp;در مقابل، ما علاوه بر تطبیق اصلاحات عمده در وزارت&zwnj;های امور داخله و دفاع، یک بسته&zwnj;ی اشتغال&zwnj;زایی اضطراری را در کابل تطبیق می&zwnj;نماییم که در هفته&zwnj;های نزدیک راه&zwnj;اندازی خواهد شد.</p>\r\n<p>مردم سراسر کشور ما خواهان ثبات&zwnj;اند. تحقق بخشیدن این خواست مستلزم تقویت پروسه&zwnj;های دولت&zwnj;سازی، بازارسازی، ملت&zwnj;سازی و صلح&zwnj;سازی می&zwnj;باشد.</p>\r\n<p>&nbsp;</p>\r\n<p>دولت&zwnj;سازی</p>\r\n<p>بیش&zwnj;تر شهروندان افغان بارها گفته&zwnj;اند که دولتی می&zwnj;خواهند که بتواند از حقوق قانونی آنها طبق قانون اساسی حراست نموده و عدالت را برای هر شهروند افغان تأمین کند. فساد، حکومتداری بد، معافیت از مجازات و سیاست&zwnj; انفعالی، از موانع اساسی فراروی دستیابی به دولتی است که شهروندان آرزو دارند.</p>\r\n<p>اصلاحات یک گزینه نه، بلکه یک امر ضروری است. بدون اصلاحات همه&zwnj;جانبه، ما هم صبر شهروندان&zwnj; و هم حمایت شرکای بین&zwnj;المللی&zwnj;مان را از دست خواهیم داد. شما بسیار سخاوتمند بوده&zwnj;اید و متحمل قربانی&zwnj;های مالی و جانی زیادی شده&zwnj;اید؛ زمان آن فرا رسیده که خودمان سرنوشت&zwnj;مان را تعیین نموده و مسؤولیت&zwnj;مان را به عهده گیریم. به منظور اصلاحات هدفمند، نمی&zwnj;توان آن را منحصر به یک شخص یا اداره نمود؛ بلکه این روند باید ملی باشد. تعهد به اصلاحات، باید برخاسته از کل حکومت باشد. اصلاحات در سرتاسر دولت از رهبران ملی گرفته تا پولیس و معلمان آن، باید مشهود باشد.</p>\r\n<p>در ادامه صحبتم، می&zwnj;خواهم روی بعضی از اصلاحات عمده که در آینده نزدیک به میان خواهد آمد، تمرکز کنم.</p>\r\n<p>تلاش&zwnj;های ما در زمینه دولت&zwnj;سازی به ایجاد یک دولت دموکراتیک که اقتدار آن برخاسته از حاکمیت قانون باشد، معطوف خواهد بود. اولین وظیفه عمده دولت، تأمین امنیت شهروندانش است.</p>\r\n<p>از سال 2014 به این سو، اردوی افغانستان در مقابل تروریستان جنگیده و دلیرانه به خاطر یک افغانستان دموکراتیک و آزاد مجادله نموده است. در هفته&zwnj;های گذشته، پولیس ما مثل همیشه کار قهرمانانه را در عرصه مبارزه علیه تروریزم انجام داده است؛ شجاعتی که پولیس در دهم جوزا، در حمله واقع چهارراهی زنبق، از خود نشان داد؛ و مهارسازی حمله انتحاری بر یک مسجد (در غرب کابل) گواهی بر این امر است. با این حال، ساختارهای مرکزی نهادهای امنیتی، بارها در حمایت سیستماتیک از سرباز و پولیس شجاع ما، ناکام مانده&zwnj;اند و نیاز به اصلاحات دارند. پلان چهارساله امنیتی ما، تضمین خواهد کرد که قوای امنیتی&zwnj;مان را به مدافعین کارا و انحراف&zwnj;ناپذیر تبدیل نماییم.</p>\r\n<p>اجازه بدهید که از زنان و مردان شامل مأموریت حمایت قاطع به&zwnj;خصوص جنرال نیکلسون و همکارانش به خاطر تعهد و همکاری دوام&zwnj;دارشان ابراز امتنان نمایم.</p>\r\n<p>در دو و نیم سال گذشته، اصلاحات اساسی در وزارت دفاع به میان آمده است و با همکاری شرکای&zwnj;مان در عرصه آموزش، تکنالوژی، و هماهنگی بهتر، ما مطمئن هستیم که قوای ملی امنیتی ما به&zwnj;زودی مطابق شرایط بین&zwnj;المللی برای نیروهای مسلح مسلکی، عیار خواهند شد. قضاوت وزیر صاحب بهرامی و شرکای ما در مأموریت حمایت قاطع، این است که باقی اصلاحات در عرصه رهبری و مدیریت، و سیستم و پروسه&zwnj;ها در سه سال آینده کامل خواهد شد.</p>\r\n<p>در حالی که اصلاحات وزارت دفاع در حال انجام است، اولویت اصلاحی در سکتور امنیتی ما، اصلاح وزارت امور داخله می&zwnj;باشد. از دیدار قبلی ما تا کنون، در سیزده پست عالی&zwnj;رتبه تغییر به میان آمده است و روند اصلاحات تسریع خواهد شد. شهروندان ما در کابل و سرتاسر کشور، به صورت مکرر بر ضرورت وجود پولیس آموزش&zwnj;دیده، بی&zwnj;طرف و متعهد در برابر تمام جامعه، صرف نظر از منافع شخصی&zwnj;شان که منجر به خراب شدن آنان از درون می&zwnj;گردد، تأکید می&zwnj;کنند.</p>\r\n<p>این اصلاحات دشوار خواهد بود و واکنش&zwnj;هایی را نیز در پی خواهد داشت؛ اصلاحات چه زمانی آسان است؟ آوردن اصلاحات همیشه دشوار است؛ اما توجه باید بر یافتن راهکار متمرکز شود، نه بر یافتن بهانه.</p>\r\n<p>اصلاحات وزارت امور داخله، کلید ثبات و تطبیق متباقی اجندای مبارزه علیه فساد است. عجالتاً، جهت تضمین فرماندهی و کنترول واحد، سر از ماه اکتوبر آینده، پولیس نظم عامه و پولیس سرحدی که از عناصر مشکل&zwnj;ساز وزارت امور داخله&zwnj;اند، به وزارت دفاع انتقال خواهد یافت. این تغییرات، همراه بررسی کلی از سوی وزارت دفاع، خواهد بود تا از توانایی رهبران در برآوردن بالاترین معیارهای اخلاقی و حرفه&zwnj;یی اطمینان حاصل شود.</p>\r\n<p>حمایت از رهبری جدید، نیازمند ملکی&zwnj;سازی سیستم&zwnj;های عمده مدیریت منابع است. در شش ماه آینده، یک هزار غیرنظامی که در عرصه&zwnj;های مدیریت مالی، تدارکات و مدیریت منابع بشری آموزش دیده&zwnj;اند، در وزارت&zwnj;های دفاع و امور داخله توظیف خواهند شد؛ در قدم بعدی، زمینه آموزش&zwnj;های بیش&zwnj;تر در زمینه سیستم&zwnj;های اعتباری، نظارت و تفتیش نیز برای آنان فراهم خواهد گردید. سرباز و پولیس مستحق اینها هستند و در جیره روزانه، یونیفورم، لوجستیک و حمایت آنان نباید تقلب صورت گیرد.</p>\r\n<p>ضرورت مفهوم&zwnj;سازی نظم و قانون، به صورت اساسی ارتباط نزدیکی با اصلاحات در بخش امنیتی دارد. در کمتر از یک سال، ستره&zwnj;محکمه و اداره لوی&zwnj;سارنوالی پیشرفت&zwnj;های چشمگیری داشته&zwnj;اند که از آن جمله می&zwnj;توان به آموزش کارمندان جدید در عرصه قانون که از آنها امتحان اخذ گردید و ارزیابی شدند؛ پیگیری و نظارت بهتر قضایا؛ تلاش&zwnj;های تازه به خاطر پایان دادن به مصونیت در زمینه جرایم علیه زنان؛ و مشارکت عامه بیش&zwnj;تر در سکتور عدلی اشاره نمود.</p>\r\n<p>ستره&zwnj;محکمه و سارنوالی اجندای اصلاحات همه&zwnj;جانبه را برای سال 1400 ه&zwnj;.ش روی دست گرفته&zwnj;اند و ما به منظور حصول اطمینان از تحکیم و دوام روند اصلاحات، مشتاقانه منتظر مشارکت&zwnj; جامعه بین&zwnj;المللی هستیم. اختیارات به کمیسیون خدمات ملکی احیاشده تفویض می&zwnj;گردد تا روند استخدام و تقرر افراد را از طریق یک پروسه شفاف تکمیل سازد.</p>\r\n<p>من به آقای نادری به خاطر تجربه اخیرشان در تقرر بیش از 400، دقیقاً 492، تن در اداره تذکره الکترونیکی تبریک می&zwnj;گویم. این تجربه از اقدامات آینده در این راستا نوید می&zwnj;دهد. 25 هزار متقاضی در این پروسه اشتراک کردند و افراد از 33 ولایت موفق به سپری نمودن امتحان شدند. پنج هزار بست دیگر نیز از طریق پروسه مشابه در ماه&zwnj;های آینده پر خواهد شد. علاوه بر آن، 8 هزار معلم نیز از همین طریق جذب خواهند شد. تمامی بست&zwnj;های معینیت مالی و اداری در تمام سطوح حکومت و سِمَت&zwnj;های ارشد در دفتر ریاست&zwnj;جمهوری، وزارت امور خارجه، ستره&zwnj;محکمه و اداره لوی&zwnj;سارنوالی نیز از همین پروسه خواهند گذشت. استخدام شفاف باید یک اصل باشد، نه استثنا. من کاملاً آماده صدور اجازه تقرر در تمامی بست&zwnj;های ارشد هستم که نیاز به امضای من دارند تا از طریق یک پروسه رقابتی انجام شوند. امیدوارم در این زمینه به توافق نظر دست یابیم.</p>\r\n<p>روند تصمیم&zwnj;گیری، بیش از حد در کابل متمرکز است. به منظور تأمین امنیت، ارائه بهتر خدمات و تشخیص نیازمندی به دانش و تفاهم محلی، ما در حال انتقال ساختار حکومتی بوده و توجه بیش&zwnj;تری را به سطح محلی متمرکز ساخته&lrm;ایم. از میثاق شهروندی گرفته تا پالیسی حکومتداری محلی، ما می&zwnj;خواهیم مطمئن گردیم که شهروندان در مرکز پروسه&zwnj;ی انکشافی قرار دارند و نقش کلیدی را در پاسخگو بودن حکومت ایفا می&zwnj;کنند. ما باید به خاطر ارائه خدمات به قریه، ساختار مرکز را تغییر دهیم، نه این که قریه را تحت اثر مرکز بیاوریم.</p>\r\n<p>افغانستان یک کشور دموکراتیک است که به صورت ذاتی، خصوصیت مشارکتی دارد. تفویض حق تصمیم&zwnj;گیری به سطح درست آن و داشتن اطمینان به حمایت از ضعیف&zwnj;ترین سطح حکومتداری، امری ضروری است؛ چراکه کلید تأمین امنیت اداره در سطح ولسوالی است. ضعف&zwnj;های ما و فقدان نهادهای نظم و قانون در سطح ولسوالی&zwnj;ها باید در کانون توجه ما قرار گیرد.</p>\r\n<p>&nbsp;</p>\r\n<p>بازارسازی</p>\r\n<p>در کنار تقویت اساسات ساختار بهتر حکومتداری، ما نیاز خواهیم داشت که در زمینه بازارسازی و انکشاف نیز اطمینان حاصل کنیم. ما باید از یک مودل توازن&zwnj;محور به طرف مودل متمرکز بر رشد حرکت کنیم. از اکلیل حکیمی وزیر مالیه و همکاران&zwnj; ایشان به خاطر جمع&zwnj;آوری عواید در وضعیت دشوار، بی&zwnj;نهایت سپاس&zwnj;گزارم؛ اما اکنون، اولویت ما باید رشد دوامدار باشد. عواید، همه چیز نیست؛ رشد پایدار که تضمین&zwnj;کننده عواید دوامدار است، همه چیز است.</p>\r\n<p>اجمل احمدی، همکارم، [مشاور ارشد رئیس&zwnj;جمهور در امور مالی] در مورد یک مودل سرمایه&zwnj;گذاری به منظور اطمینان از این که ما می&lrm;توانیم رو به جلو حرکت کنیم، با شما صحبت خواهد کرد.</p>\r\n<p>حکومت اقدامات جدی را به خاطر کاهش مصارف و مسؤولیت&zwnj;های اداری روی دست خواهد گرفت؛ و در چارچوب قانون اساسی و مقررات ما، سرمایه&zwnj;گذاری سکتور خصوصی را رشد خواهد داد. به منظور ارتقای سرمایه&zwnj;گذاری خارجی ما یک هیئت عالی&zwnj;رتبه را ایجاد خواهیم کرد که صلاحیت کار در بخش حمایت از سرمایه&zwnj;گذاران بین&zwnj;المللی که به افغانستان می&zwnj;آیند؛ کاهش تشریفات اداری و تثبیت حقوق مالکیت داشته باشند. همکارم جواد پیکار [رئیس اداره مستقل اراضی افغانستان] در مورد حقوق مالکیت با شما صحبت خواهد کرد. یک برنامه عالی به خاطر این که برخورداری شهروندان افغان از حقوق مالکیت مستحکم را تضمین کند، در حال اجرا می&zwnj;باشد. ما و وزیر معادن پرتلاش و جدیدمان خانم نرگس نهان، پیش&zwnj;بینی می&zwnj;کنیم که گسترش عمده&zwnj;ای در آفرهای [= پیشنهادات] منرالی تحت یک رژیم سرمایه&zwnj;گذاری مطلوب و شفاف رونما گردد که از یک سو موجب افزایش عواید دولت به خاطر اهداف عامه می&zwnj;شود و از سوی دیگر منجر به تشویق سرمایه&zwnj;گذاری در عرصه تکنالوژی استخراجی، اکتشاف قانونی و خاتمه دادن به سوءاستفاده و قاچاق مواد منرالی می&zwnj;گردد.</p>\r\n<p>آب، یکی دیگر از منابع عمده افغانستان می&zwnj;باشد. حکومت اساسات قانونی را به خاطر بهره&zwnj;برداری بهتر از این منبع ایجاد خواهد نمود. ما، پیش از این، روی زیربناهای آبیاری و بندهای آبی به خاطر افزایش بهره&zwnj;وری زراعتی سرمایه&zwnj;گذاری کرده&zwnj;ایم؛ و با تکمیل دیزاین تخنیکی، ما به سرمایه&zwnj;گذاری در این سکتور &nbsp;که کلید رشد و کاهش فقر است، سرعت خواهیم بخشید. هدف ما تحت کنترول درآوردن 18 میلیارد مترمکعب آب است که این کار را انجام خواهیم داد و انجام می&zwnj;شود.</p>\r\n<p>یکی از دستاوردهایی که از زمان فعالیتم به عنوان وزیر مالیه به آن مفتخرم، گشایش سکتور مخابرات به روی فراهم&zwnj;کنندگان خصوصی بود که نتیجه آن روی کار آمدن چشمگیر موبایل&zwnj;های هوشمند، اتصال به انترنت، و توانایی مکالمه افغان&zwnj;ها در سرتاسر کشور و خارج از آن می&zwnj;باشد. حالا ما باید به مرحله بعدی حرکت کنیم. سال گذشته، ما &laquo;پالیسی دسترسی باز&raquo; را توشیح کردیم. تا ختم این هفته، من حکمی را امضا می&zwnj;نمایم که این پالیسی را به مرحله تطبیق می&zwnj;گذارد. این [زمان دربرگرفته&zwnj;شده] شاید تا حدودی بروکراسی به نظر آید، اما بعضی افراد هوشیار می&zwnj;دانند که این حکم ساده، دوصد میلیون دالر و یا بیش از آن، به سرمایه&zwnj;گذاری خصوصی می&zwnj;افزاید؛ قیمت&zwnj;ها را کاهش می&zwnj;دهد؛ و کیفیت را برای مصرف&zwnj;کنندگان افغان در سه سال اول، بهبود می&zwnj;بخشد.</p>\r\n<p>ما به سرمایه&zwnj;گذاری خویش در عرصه&zwnj;هایی که منجر به همکاری منطقوی همانند دهلیزهای ترانسپورتی، خطوط برق، پایپ&zwnj;لاین&zwnj;ها، خطوط آهن و سرک&zwnj;ها می&zwnj;گردند، ادامه خواهیم داد. تاپی و کاسا1000 پروژه&zwnj;های بزرگی&zwnj;اند که به&zwnj;خوبی پیش می&zwnj;روند و اساس استراتیژی درازمدت رشد ما را تشکیل خواهند داد. آنها باید موفق گردند. ما از آنها داستان&zwnj;هایی خواهیم ساخت که حکایت کنند چگونه یک افغانستان باثبات می&zwnj;تواند باعث غنی&zwnj;تر شدن آسیای مرکزی گردد، در حالی که این امر در موجودیت یک افغانستان بی&zwnj;ثبات، هرگز امکان&rlm;پذیر نخواهد بود.</p>\r\n<p>می&zwnj;خواهم به همکارم داکتر قیومی [مشاور ارشد رئیس&zwnj;جمهور در امو زیربناها] به خاطر رسیدن به این هدف تنها در دو و نیم سال، تبریک بگویم. افغانستان بعد از یک دوره 130 ساله، دوباره، با قدرت به آسیای مرکزی ملحق شد. اکنون اقتصادهای ما &ndash; افغانستان و آسیای میانه &ndash; با هم مرتبط هستند. آنها در حال مبدل شدن به بزرگ&lrm;ترین شرکای تجاری ما هستند و اعتماد آنها چه در هر زمینه کاسا1000، تاپی یا خطوط آهن باشد، تغییر چشمگیری را در جهت&zwnj;دهی به ما ایجاد کرده است.</p>\r\n<p>کلید وصل شدن آسیای میانه به آسیای جنوبی، پیروی تمام منطقه از قوانین سازمان تجارت جهانی (WTO) است. تجارت بر اساس خاستگاه یا محدودیت&zwnj;ها نه، بلکه باید به صورت آزادانه جریان داشته باشد. تمام ما در سیستمی که در آن تجارت و ترانزیت یکجا شده، برنده خواهیم بود. ما روی دیدگاه انتقال پنج هزار الی پنجاه&zwnj; هزار میگاوات انرژی برق از آسیای مرکزی به آسیای جنوبی کار می&zwnj;کنیم. عواید برخاسته از انتقال دو هزار میگاوات برق با عواید گمرکات در کشور برابری خواهد کرد.</p>\r\n<p>ما با اتخاذ روش&zwnj;های جدید در این باره تأمل می&zwnj;کنیم و خود را وقف آن ساخته&lrm;ایم، اما رژیم سرمایه&zwnj;گذاری باید در اولویت قرار گیرد. در حال حاضر، صندوق بین&zwnj;&zwnj;&zwnj;&zwnj;&zwnj;&zwnj;&zwnj;&zwnj;المللی پول (IMF) بر اساس سرمایه&zwnj;گذاری دولتی و خصوصی در افغانستان سه درصد رشد را پیش&zwnj;بینی نموده است. در قدم بعد، با بهره&zwnj;برداری از فرصت&zwnj;هایی که در مقابل ما قرار دارد، تسریع روند اصلاحات و بهبود اجرای بودجه، می&zwnj;تواند رشد ما را به پیمانه 3 الی 6 درصد بیش&zwnj;تر افزایش دهد.</p>\r\n<p>آقای اجمل احمدی یک مودل سرمایه&zwnj;گذاری را که اختصاص منابع به صورت کارا و تطبیق مؤثر آنها را تضمین می&zwnj;کند، انکشاف داده است که آن را با شما شریک خواهد ساخت.</p>\r\n<p>&nbsp;</p>\r\n<p>ملت&zwnj;سازی</p>\r\n<p>در کنار بازارسازی، ما باید یک ملت متحد نیز بسازیم. ملت، عبارت از یک جامعه اخلاقی می&zwnj;باشد. ملت&zwnj;سازی نیازمند پرورش احساس عمیق تحمل به خاطر گفت&zwnj;وگو و بحث&zwnj;های آزاد می&zwnj;باشد. جامعه&zwnj;ای همانند جامعه ما که تقریباً چهل سال جنگ مداوم را تجربه کرده است، نیاز دارد که ظرفیت شنیدن و درک رنج&zwnj;ها و زخم&zwnj;های گذشته را که آینده&zwnj;ی ما را تعقیب می&zwnj;کند، در خود پرورش دهد. در صورتی که ما بر گذشته غالب نشویم، از آینده نیز محروم خواهیم شد.</p>\r\n<p>من، داکتر عبدالله و همه ما، مصمم هستیم که اطمینان یابیم آینده از آن ماست و ما قربانیان گذشته نیستیم. افغانستان یک جامعه&zwnj;ی ذی&zwnj;نفع است. مشوره در این کشور یک امر حتمی و ضروری است. به عنوان رئیس&zwnj;جمهور و به عنوان یک شهروند، پی برده&zwnj;ام که خِرد جمعی یک امر عالی و بسیار سازنده است؛ بنابراین، من خودم را به ایجاد یک استراتیژی رجوع سرتاسری مردمی به خصوص با شامل ساختن علما، بزرگان، جوانان، زنان، فقرا و جامعه تجاری&zwnj;مان، متعهد می&zwnj;دانم.</p>\r\n<p>احساس نارضایتی، شکل لسانی، سمتی و هویتی به خود می&zwnj;گیرد. ما نمی&zwnj;توانیم نابودی مخفی برخاسته از قطب&zwnj;بندی هویتی را دست&zwnj;کم بگیریم. مثل همیشه، رهبران بی&zwnj;پروا و متشبثینی که منافع ملی را قربانی منفعت شخصی&zwnj;شان می&zwnj;کنند، می&zwnj;توانند یک جامعه پولاریزه را دستکاری کنند. ما نمی&zwnj;توانیم اجازه چنین کاری را بدهیم. اما ما همچنین باید تصدیق کنیم که نارضایتی&zwnj;های هویتی، پیچیده و به صورت عمیقی محسوس است که بیش&zwnj;تر استوار بر بی&zwnj;توجهی و تبعیضی است که از گذشته بر جا مانده است. حکومت وحدت ملی نمی&zwnj;تواند اجازه دهد که این زهر گسترش یابد.</p>\r\n<p>به عنوان بخشی از مشوره&zwnj;ها و رجوع به مردم، من یک گفتمان ملی را که نگرانی&zwnj;های مردم را مشخص خواهد ساخت، رهبری خواهم کرد تا بتوانیم با آنان به صورت آزادانه بحث کنیم و به صورت جمعی از قطب&zwnj;بندی&zwnj; &zwnj;شدن کشورمان جلوگیری کنیم.</p>\r\n<p>در بخش&zwnj;هایی همانند پالیسی&zwnj;ها، سرمایه&zwnj;گذاری&zwnj;ها و کارمندان حکومت که تحت کنترول ماست، ما به دقت اوضاع را بررسی می&zwnj;کنیم تا اطمینان یابیم با تمامی اقشار به صورت عادلانه رفتار می&zwnj;شود و به عنوان یک شهروند برابر (با شهروند دیگر) &ndash; که حق هر افغان بوده و قانون اساسی آن را تضمین کرده &ndash; از وی نمایندگی شده است.</p>\r\n<p>در یک حکومت مبتنی بر دموکراسی، انتخابات آزاد و عادلانه، میکانیزم کلیدی به خاطر پاسخگو ساختن حکومت است. کمیسیون مستقل انتخابات تصمیم خود مبنی بر برگزاری انتخابات پارلمانی در جولای 2018 [سرطان 1397] را اعلام کرده است. من و حکومت وحدت ملی به صورت همه&zwnj;جانبه از کمیسیون انتخابات حمایت همه&zwnj;جانبه می&zwnj;نماییم تا انتخابات را با استقلالیت و بی&zwnj;طرفی و به صورت عادلانه و فراگیر برگزار کند. به خاطر تحقق این هدف، باید مشوره&zwnj;های فشرده بین کمیسیون مستقل انتخابات، نهادهای جامعه مدنی، نهادهای زنان و جوانان، احزاب سیاسی، علما و دیگر اقشار جامعه ما و جامعه بین&zwnj;المللی وجود داشته باشد. من به رسانه&zwnj;ها و احزاب سیاسی&zwnj;مان تأکید دارم که از انتخابات پارلمانی آینده به خاطر راه&zwnj;اندازی گفت&zwnj;وگوهای ملی همه&zwnj;جانبه درباره مشکلات ما و راه&zwnj;حل&zwnj;های بالقوه استفاده کنند.</p>\r\n<p>آمادگی برای انتخابات ریاست جمهوری سال 2019 نیز باید به&zwnj;زودی آغاز گردد. ما اطمینان می&zwnj;دهیم که جدول زمانی و معیاراتی که کمیسیون اتخاذ کرده، تطبیق می&zwnj;گردند. یک پلان عمل طی سه هفته آینده با مردم و جامعه بین&zwnj;المللی شریک خواهد شد. این پلان عمل شامل قوانینی به منظور دسترسی عادلانه به رسانه&zwnj;ها خواهد بود. این انتخابات فرصت را برای نسلی که به خاطر ورود به عرصه سیاسی به بلوغ رسیده فراهم می&zwnj;کند. ایجاد یک گفتمان عامه به خاطر رسیدن به اطمینان نسبت به وجود یک عرصه برابر و مساوی برای همه نیز باید یک اولویت باشد.</p>\r\n<p>نظارت یک مسأله حیاتی به خاطر اعتبار انتخابات است. ما از تمامی گروه&zwnj;های جامعه، به ویژه نهادهای جامعه مدنی، می&zwnj;خواهیم که در یک گفت&zwnj;وگو روی نظارت از انتخابات سهم بگیرند و در این راستا سیستم&zwnj;ها و پروسه&zwnj;های عادلانه ایجاد کنند. ما به همین ترتیب از جامعه بین&zwnj;المللی می&zwnj;خواهیم که به منظور ایجاد یک میکانیزم قوی و معتبر نظارت بر انتخابات، به ما ملحق شده و به ما کمک کنند.</p>\r\n<p>&nbsp;</p>\r\n<p>صلح&zwnj;سازی</p>\r\n<p>حکومت وحدت ملی از زمان ایجاد به یک دیدگاه صلح متعهد بوده است. ما سرمایه سیاسی و زندگی&zwnj;مان را به خاطر تأمین صلح تقدیم کرده&zwnj;ایم؛ اما دستی که ما برای صلح دراز کردیم، هنوز گرفته نشده است. همچنین، درخواست ما به خاطر تضمین بی&zwnj;طرفی روابط دولت با دولت همراه پاکستان هنوز تحقق نیافته است. ما مصمم به تأمین صلح هستیم، اما جامعه بین&zwnj;المللی باید درک کند که تحمل مردم ما به خاطر این ویرانی&zwnj;ها به سر خواهد رسید.</p>\r\n<p>گروه&zwnj;های طالبان، باید بدانند که زمان به نفع&zwnj;شان نیست. آنان می&zwnj;توانند صلح و آشتی واقعی را بپذیرند، و یا آماده باشند که از طرف جامعه جهانی به عنوان یک سازمان تروریستی در دسته&zwnj;بندی قرار گیرند.</p>\r\n<p>جامعه بین&zwnj;المللی باید واضح بسازد که وقتی تمامی نورم&zwnj;های پذیرفته&zwnj;شده نقض می&zwnj;شوند، و سفارت&zwnj;خانه&zwnj;ها و دیپلوماتان به صورت عمدی مورد حمله قرار می&zwnj;گیرند، سکوت نمی&zwnj;تواند پاسخی برای آن باشد.</p>\r\n<p>ما در خط مقدم نبرد برای دفاع از استقلال کشورمان و امنیت جهانی قرار داریم. چالش&lrm;ها واضح است و در صورتی که ما با قاطعیت، انسجام و در جهت مشخص عمل نکنیم، بدتر از این خواهند شد.</p>\r\n<p>ملت اراده&zwnj;اش را به ما تثبیت کرده است. اکنون این به ما، یعنی خدمت&zwnj;گزاران مردم، تعلق می&zwnj;گیرد تا دولت را به عنوان ابزاری برای تحول کشور &ndash; آنچه مردم و هموطنان&zwnj;مان آرزو دارند &ndash; مبدل سازیم.</p>\r\n<p>ما باید به فساد پایان دهیم.</p>\r\n<p>ما باید عدالت را تأمین کنیم.</p>\r\n<p>ما باید اطفال&zwnj;مان را آموزش دهیم.</p>\r\n<p>و ما باید صلح را تأمین کنیم.</p>\r\n<p>آنچه جامعه بین&zwnj;المللی از ما می&zwnj;خواهد، همان است که مردم ما می&zwnj;خواهند. جامعه بین&zwnj;المللی هیچ&zwnj;گونه اجندای بیرونی ندارد. شرایطی که ما پیشنهاد می&zwnj;دهیم، شرایط خودمان است؛ بنابراین اراده ما است که شرایطی که خودمان پیشنهاد کرده&zwnj;ایم را برآورده سازیم.</p>\r\n<p>بیایید متحد شویم تا آینده را برای نسل بعدی مصون بسازیم. یک افغانستان باثبات به نفع همه است و این کشور تکیه&zwnj;گاهی برای امنیت جهانی بوده و مکانی خواهد بود که در آن شرق و غرب، شمال و جنوب، با هم یکجا می&zwnj;شوند؛ همان طور که برای هزاران سال اینگونه بوده است.</p>\r\n<p>تشکر از شما. [تشویق حاضرین]</p>\r\n<p><img src=\"http://ocs.gov.af/images/1378.jpg\" width=\"611\" height=\"259\" /></p>', NULL, '8.jpg', 'statement'),
(9, NULL, 'افغانستان از لحاظ سیاسی، شاهد یکی از بهترین تغییرات نسلی است. نیمی از کابینه ما کمتر از چهل سال، سن دارند. این امر برای کشوری که چهل سال درگیر جنگ بود', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9.png', 'word');

-- --------------------------------------------------------

--
-- Table structure for table `presidential_palace`
--

CREATE TABLE `presidential_palace` (
  `id` int(11) NOT NULL,
  `desc_en` text,
  `desc_dr` text CHARACTER SET utf32 COLLATE utf32_persian_ci,
  `desc_pa` text CHARACTER SET utf32 COLLATE utf32_persian_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presidential_palace`
--

INSERT INTO `presidential_palace` (`id`, `desc_en`, `desc_dr`, `desc_pa`) VALUES
(1, NULL, '<p>test</p>', '<p style=\"text-align: right;\">با به سر آمدن مهلت تخلیه اردوگاه پناهجویان در جزیره مانوس در پاپوآ گینه نو، شماری از ساکنان اردوگاه از خروج از این محل خودداری کرده&zwnj;اند.</p>\r\n<p style=\"text-align: right;\">صبح سه&zwnj;شنبه، ٩ آبان (٣١ اکتبر)، مهلت دولت پاپوآ گینه نو برای تعطیل کردن اردوگاه پناهجویان در جزیره مانوس به سر آمد در حالیکه دولت این کشور و مسئولان مهاجرتی استرالیا از ساکنان اردوگاه خواسته بودند پیش از این زمان، آن را تخلیه کنند.</p>\r\n<p style=\"text-align: right;\">این اردوگاه یکی از مکان&zwnj;هایی است که دولت استرالیا در اجرای سیاست سختگیرانه در مورد پناهجویان، آن را برای اسکان پناهجویان در مدت رسیدگی به درخواست پناهندگی آنان در اختیار گرفته بود. سال گذشته، دیوان عالی پاپوآ گینه نو نگهداری افراد در این محل را به منزله محبوس کردن آنان بدون محاکمه و حکم قضایی دانست و به علت مغایرت این اقدام با موازین حقوق بشر و قانون اساسی این کشور، دستور تعطیلی آن را صادر کرد.</p>\r\n<p style=\"text-align: right;\">به ساکنان این اردوگاه گفته شده که می&zwnj;توانند به اردوگاه مشابهی در جزیره نارو انتقال یابند، به عنوان پناهجو یا پناهنده در پاپوآ گینه نو بمانند، به کشورشان بازگردند یا کشور دیگری، از جمله کامبوج را برای پناهندگی بپذیرند.</p>\r\n<p style=\"text-align: right;\"><a class=\"story-body__link\" href=\"http://www.bbc.com/persian/world-41171145\">+ دادگاه عالی استرالیا پرداخت غرامت به ساکنان اردوگاه پناهجویان را تایید کرد</a></p>\r\n<p style=\"text-align: right;\"><a class=\"story-body__link\" href=\"http://www.bbc.com/persian/world-39991366\">+ ضرب الاجل وزارت مهاجرت استرالیا به پناهجویان</a></p>\r\n<p style=\"text-align: right;\"><a class=\"story-body__link\" href=\"http://www.bbc.com/persian/iran/2016/04/160416_l45_iranian_refugee_australia_suicide\">+ پناهجوی ایرانی در استرالیا برای خودکشی به پرداخت جریمه محکوم شد</a></p>');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `title`, `image`) VALUES
(2, 'سیاسی، شاهد یکی از بهترین تغییرات نسلی است', '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `search_table`
--

CREATE TABLE `search_table` (
  `id` int(11) NOT NULL,
  `title_en` varchar(250) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `title_dr` varchar(250) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `title_pa` varchar(250) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `date_en` varchar(20) DEFAULT NULL,
  `date_dr` varchar(20) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `date_pa` varchar(20) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `short_desc_en` text CHARACTER SET utf8 COLLATE utf8_persian_ci,
  `short_desc_dr` text CHARACTER SET utf8 COLLATE utf8_persian_ci,
  `short_desc_pa` text CHARACTER SET utf8 COLLATE utf8_persian_ci,
  `description_en` text CHARACTER SET utf8 COLLATE utf8_persian_ci,
  `description_dr` text CHARACTER SET utf8 COLLATE utf8_persian_ci,
  `description_pa` text CHARACTER SET utf8 COLLATE utf8_persian_ci,
  `table_name` varchar(50) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `table_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `search_table`
--

INSERT INTO `search_table` (`id`, `title_en`, `title_dr`, `title_pa`, `date_en`, `date_dr`, `date_pa`, `short_desc_en`, `short_desc_dr`, `short_desc_pa`, `description_en`, `description_dr`, `description_pa`, `table_name`, `type`, `table_id`) VALUES
(25, NULL, 'خلاصه گزارش حکومت به شورای ملی ۱۳۹۵', 'خلاصه گزارش حکومت به شورای ملی ۱۳۹۵', NULL, '1396 - 08 - 11', '1396 - 08 - 11', NULL, NULL, NULL, NULL, NULL, NULL, 'documents', NULL, 1),
(26, NULL, 'از حرف تا عمل | سیاست خارجی و دستاورد ها', 'از حرف تا عمل | مبارزه با فساد و دستاورد ها', NULL, '1396 - 08 - 11', '1396 - 08 - 11', NULL, NULL, NULL, NULL, NULL, NULL, 'videos', 'video', 1),
(27, NULL, 'فرمان رئیس جمهوری اسلامی افغانستان در مورد تقرر حفیظ الله ولی رحیمی بحیث رئیس عمومی تربیت بدنی و سپورت', NULL, NULL, '1396 - 08 - 11', NULL, NULL, 'بتأسی از حکم فقره (۱۳) ماده شصت و چهارم قانون اساسی افغانستان، تقرر محترم حفیظ الله ولی رحیمی را، در بست خارج رتبه، به حیث رئیس عمومی تربیت بدنی و سپورت، منظور می نمایم.', NULL, NULL, '<p>&nbsp;بتأسی از حکم فقره (۱۳) ماده شصت و چهارم قانون اساسی افغانستان، تقرر محترم حفیظ الله ولی رحیمی را، در بست خارج رتبه، به حیث رئیس عمومی تربیت بدنی و سپورت، منظور می نمایم.&nbsp;&nbsp;</p>\r\n<p>از خداوند متعال توفیقات مزید شانرا، در اجرای وظایف محوله استدعا میدارم.</p>\r\n<p>محمد اشرف غنی</p>\r\n<p>رئیس جمهوری اسلامی افغانستان</p>', NULL, 'president', 'decree', 5),
(28, NULL, 'فرمان رئیس جمهوری اسلامی افغانستان در مورد ارتقای بست ریاست عمومی اداره تدارکات ملی و تقرر رئیس آن اداره', NULL, NULL, '1396 - 08 - 11', NULL, NULL, 'به تأسی از فقره (۱۳) ماده (۶۴) قانون اساسی افغانستان، ارتقای بست ریاست عمومی اداره تدارکات ملی از مافوق رتبه به خارج رتبه و تقرر الهام عمر هوتکی بحیث رئیس عمومی اداره تدارکات ملی، در بست خارج رتبه، منظور است.', NULL, NULL, '<p>به تأسی از فقره (۱۳) ماده (۶۴) قانون اساسی افغانستان، ارتقای بست ریاست عمومی اداره تدارکات ملی از مافوق رتبه به خارج رتبه و تقرر الهام عمر هوتکی بحیث رئیس عمومی اداره تدارکات ملی، در بست خارج رتبه، منظور است.</p>\r\n<p>از خداوند متعال (ج) توفیقات مزید در اجرای امور محوله برای شان استدعا می نمایم.</p>\r\n<p>محمد اشرف غنی</p>\r\n<p>رئیس جمهوری اسلامی افغانستان</p>', NULL, 'president', 'decree', 6),
(29, NULL, 'حكم رئیس جمهوری اسلامی افغانستان در مورد تدویر انتخابات کمیته ملی المپیک', NULL, NULL, '1396 - 08 - 11', NULL, NULL, 'به منظور جلوگيری از خلای مديريتی و به منظور جلوگیری از موجودیت نهاد های موازی کمیته ملی المپیک مراتب آتی هدایت داده می شود:', NULL, NULL, '<p>&nbsp;به منظور جلوگيری از خلای مديريتی و به منظور جلوگیری از موجودیت نهاد های موازی کمیته ملی المپیک مراتب آتی هدایت داده می شود:</p>\r\n<p>ماده اول:</p>\r\n<p>کمیته ملی المپیک موظف است تا در اسرع وقت ممکنه و در هماهنگی مطابق منشور کمیته المپیک آسیایی و جهانی، اساسنامه، اسناد و مقررات داخلی و ریاست عمومی تربیت بدنی و سپورت جهت انتخاب رئیس جدید آن کمیته انتخابات را دایر نمایند.</p>\r\n<p>ماده دوم:</p>\r\n<p>هيئتی که منافی با اساسنامه و منشور كميته المپيک جهانی نباشد برای زمينه سازی تغييرات و اجراي انتخابات تحت نظر کميته المپيک جهانی بصورت شفاف و اصولی تعين شود</p>\r\n<p>ماده سوم:</p>\r\n<p>نهاد های موازی کمیته ملی المپیک با صدور این حکم ملغی دانسته می شود وهر نوع انتخاباتی که قبلا بدون نظارت بين المللي انجام شده باشد از اعتبار ساقط است.</p>\r\n<p>&nbsp;</p>\r\n<p>محمد اشرف غنی</p>\r\n<p>رئیس جمهوری اسلامی افغانستان</p>', NULL, 'president', 'order', 7),
(30, NULL, 'ترجمه سخنرانی رئیس‌جمهور محمد اشرف غنی در بیستمین نشست بورد مشترک هماهنگی نظارت (JCMB)', NULL, NULL, '1396 - 08 - 11', NULL, NULL, 'به نام خداوند بخشاینده مهربان.\r\n\r\nآقای حکیمی وزیر مالیه، آقای یاماموتو نماینده خاص سکرترجنرال سازمان ملل متحد برای افغانستان، لوی‌سارنوال حمیدی، اعضای کابینه، سفرای برجسته، نمایندگان محترم، والیان، اعضای جامعه مدنی، فعالان [حقوق] زن، دوستان و هموطنان.', NULL, NULL, '<p>به نام خداوند بخشاینده مهربان.</p>\r\n<p>آقای حکیمی وزیر مالیه، آقای یاماموتو نماینده خاص سکرترجنرال سازمان ملل متحد برای افغانستان، لوی&zwnj;سارنوال حمیدی، اعضای کابینه، سفرای برجسته، نمایندگان محترم، والیان، اعضای جامعه مدنی، فعالان [حقوق] زن، دوستان و هموطنان.</p>\r\n<p>بی&zwnj;نهایت خرسندم که شما را به نشست بورد مشترک نظارت و هماهنگی (JCMB) خوش&zwnj;آمدید گفته و از شما به خاطر همدلی و تعهدتان ابراز امتنان می&zwnj;نمایم. شما به شهری آمده&zwnj;اید که عزادار است. کابل هنوز هم در غم از دست دادن هموطنان&zwnj;مان ماتم گرفته است. حمله شنیع دهم جوزا تنها حمله به شهروندان صلح&zwnj;دوست کابل نه، بلکه حمله بر اصول پذیرفته&zwnj;شده، کنوانسیون&zwnj;ها، معاهدات و فرهنگ&zwnj;های حاکم بر دیپلوماسی جهانی بود؛ و اگر شجاعت هفت تن از افسران افغان نمی&zwnj;بود، این حمله می&zwnj;توانست جان&zwnj;های بیش&zwnj;تری از جمله همکاران بین&zwnj;المللی&zwnj;مان را بگیرد.</p>\r\n<p>اما چه افرادی در انجام چنین اعمال جنایتکارانه، وحشیانه و نامشروع دخیل&zwnj;اند؟ چه کسی می&zwnj;تواند اعمال ترور اینچنینی را حمایت کند؟ چگونه می&zwnj;توان به آنها پناهگاه داد و از آنان حمایت کرد؟ چه نوع بدگمانی و بی&zwnj;تفاوتی نسبت به جامعه جهانی مشمول کشورهای مطیع قانون، به سازمان&zwnj;های جنایتکار این فرصت را می&zwnj;دهد که با تکیه بر ابزارهای سیاسی، عمداً غیرنظامیان را هدف قرار داده، به قتل برسانند و قربانیان بی&zwnj;گناهی را رقم بزنند که تنها جرم&zwnj;شان این بود که افغان&zwnj;هایی ساده&zwnj;اند و برای تهیه غذای خانواده&zwnj;های&zwnj;شان و تربیت فرزندان خود کار می&zwnj;کنند؟ شما در جامعه جهانی، و ما این جا در افغانستان؛ همه ما با تحمل دردهای بسیار آموخته&zwnj;ایم که وقتی به تروریزم اجازه داده شود، و حتی تشویق به رشد گردد، تروریست&zwnj;ها به سرعت در مبارزه با حامیان خود قرار گرفته و تخریب&zwnj;شان را به فراتر از مرزهای هر کشور و یا مردمی، گسترش خواهند داد.</p>\r\n<p>به صورت عموم افغان&zwnj;ها و به صورت خاص شهروندان کابل دارای روحیه&zwnj;ای انعطاف&zwnj;پذیر و بااراده هستند. ما در حال بازیافتن (وضعیت) هستیم. هفته گذشته، از دو مکتب نزدیک به محل حمله بازدید کردم. علایم فزیکی تخریب در همه جا بود؛ اما همه اطفال کوچک، مرا مطمئن ساختند که کابوس&zwnj;های&zwnj;شان متوقف شده است. زمانی که پرسیدم چند نفر می&zwnj;خواهند یک روز رئیس&zwnj;جمهور شوند، بیش از نیمی از آنان دست&zwnj;شان را بالا بردند. اطفال بر کابوس&zwnj;ها غالب شده&zwnj;اند، اما بزرگسالان هنوز با آنها زندگی می&zwnj;کنند. ما باید کارهای زیادی انجام بدهیم تا به کابوس&zwnj;های بزرگسالان و جوانان ما نقطه پایان بگذاریم.</p>\r\n<p>روحیه استوار ما، با نوع مشارکتی که شما همکاران بین&zwnj;المللی ما نشان داده&zwnj;اید، تقویت یافته است.</p>\r\n<p>نخست؛ شما متحدانه در کنار ما ایستادید تا کنفرانس کابل را تدویر نموده و پروسه کابل را احیا نماییم. ما در پی صلح، متحدانه ایستاده&zwnj;ایم، زیرا صلح نخستین اولویت شهروندان افغانستان می&zwnj;باشد.</p>\r\n<p>دوم؛ شما در پیروی از نورم&zwnj;های بین&zwnj;المللی رفتاری که جوامع متمدن را به یکدیگر پیوند می&zwnj;دهد، متفق&zwnj;القول و صریح بوده&zwnj;اید.</p>\r\n<p>سوم؛ شما قدرت پایداری&zwnj;تان را نشان دادید. می&zwnj;خواهم از هر عضو جامعه بین&zwnj;المللی، دیپلومات&zwnj;ها، متخصصان انکشاف و فعالان جامعه مدنی به خاطر همدلی، غم&zwnj;شریکی و انعطاف&zwnj;پذیری&zwnj;تان سپاس&zwnj;گزاری کنم. شما حق کامل را به خاطر این که شهروند کابل محسوب شوید به دست آورده&zwnj;اید و من به عنوان یک کابلی، از پیوستن شما به جامعه کابل استقبال می&zwnj;کنم.</p>\r\n<p>شما در مورد امنیت&zwnj;تان، نگرانی&zwnj;های بجا دارید. من به نمایندگی از شهروندان کابل می&zwnj;گویم که تأمین امنیت شما در صدر اولویت&zwnj;های ما قرار دارد. ما قبلاً اقدامات جدید امنیتی را روی دست گرفته&zwnj;ایم. طی هفته&zwnj;های آینده، ما با بازرسی دقیق&zwnj;تر، کنترول بهتر ترافیک به خاطر نظارت خوب&zwnj;تر و جلوگیری از نفوذ (دشمن)، آموزش نیروهای امنیتی و استخباراتی که در کابل فعالیت دارند، در صدد افزایش امنیت در شهر کابل هستیم. انجام این اقدامات در ماه&zwnj;های اول دشوار خواهد بود، به همین دلیل از شهروندان کابل می&zwnj;خواهم که به خاطر تأمین امنیت شهر کابل، شش ماه به حکومت وحدت ملی مهلت دهند. در عین حال ما نیاز به استخبارات بهتر و ایستادگی بیش&zwnj;تر شهروندان داریم که به خاطر توقف تروریست&zwnj;ها برای ورود به این شهر بسیج شوند.</p>\r\n<p>مشاوره&zwnj;های من با بیش از هفت هزار شهروند کابل، ناامیدی عمیق همراه آشفتگی آنان و همچنین اجماع&zwnj;شان روی نیاز به اصلاحات کلیدی در بخش امنیت و انکشاف را نشان می&zwnj;داد. مردم نیازمند کار هستند. در نبود شغل و کار، مجموعه نامحدودی از همدستان و حمله&zwnj;کنند&zwnj;گان انتحاری، آماده می&zwnj;گردند که به این گروه&zwnj;ها بپیوندند که به&zwnj;خوبی از لحاظ مالی تأمین می&rlm;شوند.</p>\r\n<p>&nbsp;در مقابل، ما علاوه بر تطبیق اصلاحات عمده در وزارت&zwnj;های امور داخله و دفاع، یک بسته&zwnj;ی اشتغال&zwnj;زایی اضطراری را در کابل تطبیق می&zwnj;نماییم که در هفته&zwnj;های نزدیک راه&zwnj;اندازی خواهد شد.</p>\r\n<p>مردم سراسر کشور ما خواهان ثبات&zwnj;اند. تحقق بخشیدن این خواست مستلزم تقویت پروسه&zwnj;های دولت&zwnj;سازی، بازارسازی، ملت&zwnj;سازی و صلح&zwnj;سازی می&zwnj;باشد.</p>\r\n<p>&nbsp;</p>\r\n<p>دولت&zwnj;سازی</p>\r\n<p>بیش&zwnj;تر شهروندان افغان بارها گفته&zwnj;اند که دولتی می&zwnj;خواهند که بتواند از حقوق قانونی آنها طبق قانون اساسی حراست نموده و عدالت را برای هر شهروند افغان تأمین کند. فساد، حکومتداری بد، معافیت از مجازات و سیاست&zwnj; انفعالی، از موانع اساسی فراروی دستیابی به دولتی است که شهروندان آرزو دارند.</p>\r\n<p>اصلاحات یک گزینه نه، بلکه یک امر ضروری است. بدون اصلاحات همه&zwnj;جانبه، ما هم صبر شهروندان&zwnj; و هم حمایت شرکای بین&zwnj;المللی&zwnj;مان را از دست خواهیم داد. شما بسیار سخاوتمند بوده&zwnj;اید و متحمل قربانی&zwnj;های مالی و جانی زیادی شده&zwnj;اید؛ زمان آن فرا رسیده که خودمان سرنوشت&zwnj;مان را تعیین نموده و مسؤولیت&zwnj;مان را به عهده گیریم. به منظور اصلاحات هدفمند، نمی&zwnj;توان آن را منحصر به یک شخص یا اداره نمود؛ بلکه این روند باید ملی باشد. تعهد به اصلاحات، باید برخاسته از کل حکومت باشد. اصلاحات در سرتاسر دولت از رهبران ملی گرفته تا پولیس و معلمان آن، باید مشهود باشد.</p>\r\n<p>در ادامه صحبتم، می&zwnj;خواهم روی بعضی از اصلاحات عمده که در آینده نزدیک به میان خواهد آمد، تمرکز کنم.</p>\r\n<p>تلاش&zwnj;های ما در زمینه دولت&zwnj;سازی به ایجاد یک دولت دموکراتیک که اقتدار آن برخاسته از حاکمیت قانون باشد، معطوف خواهد بود. اولین وظیفه عمده دولت، تأمین امنیت شهروندانش است.</p>\r\n<p>از سال 2014 به این سو، اردوی افغانستان در مقابل تروریستان جنگیده و دلیرانه به خاطر یک افغانستان دموکراتیک و آزاد مجادله نموده است. در هفته&zwnj;های گذشته، پولیس ما مثل همیشه کار قهرمانانه را در عرصه مبارزه علیه تروریزم انجام داده است؛ شجاعتی که پولیس در دهم جوزا، در حمله واقع چهارراهی زنبق، از خود نشان داد؛ و مهارسازی حمله انتحاری بر یک مسجد (در غرب کابل) گواهی بر این امر است. با این حال، ساختارهای مرکزی نهادهای امنیتی، بارها در حمایت سیستماتیک از سرباز و پولیس شجاع ما، ناکام مانده&zwnj;اند و نیاز به اصلاحات دارند. پلان چهارساله امنیتی ما، تضمین خواهد کرد که قوای امنیتی&zwnj;مان را به مدافعین کارا و انحراف&zwnj;ناپذیر تبدیل نماییم.</p>\r\n<p>اجازه بدهید که از زنان و مردان شامل مأموریت حمایت قاطع به&zwnj;خصوص جنرال نیکلسون و همکارانش به خاطر تعهد و همکاری دوام&zwnj;دارشان ابراز امتنان نمایم.</p>\r\n<p>در دو و نیم سال گذشته، اصلاحات اساسی در وزارت دفاع به میان آمده است و با همکاری شرکای&zwnj;مان در عرصه آموزش، تکنالوژی، و هماهنگی بهتر، ما مطمئن هستیم که قوای ملی امنیتی ما به&zwnj;زودی مطابق شرایط بین&zwnj;المللی برای نیروهای مسلح مسلکی، عیار خواهند شد. قضاوت وزیر صاحب بهرامی و شرکای ما در مأموریت حمایت قاطع، این است که باقی اصلاحات در عرصه رهبری و مدیریت، و سیستم و پروسه&zwnj;ها در سه سال آینده کامل خواهد شد.</p>\r\n<p>در حالی که اصلاحات وزارت دفاع در حال انجام است، اولویت اصلاحی در سکتور امنیتی ما، اصلاح وزارت امور داخله می&zwnj;باشد. از دیدار قبلی ما تا کنون، در سیزده پست عالی&zwnj;رتبه تغییر به میان آمده است و روند اصلاحات تسریع خواهد شد. شهروندان ما در کابل و سرتاسر کشور، به صورت مکرر بر ضرورت وجود پولیس آموزش&zwnj;دیده، بی&zwnj;طرف و متعهد در برابر تمام جامعه، صرف نظر از منافع شخصی&zwnj;شان که منجر به خراب شدن آنان از درون می&zwnj;گردد، تأکید می&zwnj;کنند.</p>\r\n<p>این اصلاحات دشوار خواهد بود و واکنش&zwnj;هایی را نیز در پی خواهد داشت؛ اصلاحات چه زمانی آسان است؟ آوردن اصلاحات همیشه دشوار است؛ اما توجه باید بر یافتن راهکار متمرکز شود، نه بر یافتن بهانه.</p>\r\n<p>اصلاحات وزارت امور داخله، کلید ثبات و تطبیق متباقی اجندای مبارزه علیه فساد است. عجالتاً، جهت تضمین فرماندهی و کنترول واحد، سر از ماه اکتوبر آینده، پولیس نظم عامه و پولیس سرحدی که از عناصر مشکل&zwnj;ساز وزارت امور داخله&zwnj;اند، به وزارت دفاع انتقال خواهد یافت. این تغییرات، همراه بررسی کلی از سوی وزارت دفاع، خواهد بود تا از توانایی رهبران در برآوردن بالاترین معیارهای اخلاقی و حرفه&zwnj;یی اطمینان حاصل شود.</p>\r\n<p>حمایت از رهبری جدید، نیازمند ملکی&zwnj;سازی سیستم&zwnj;های عمده مدیریت منابع است. در شش ماه آینده، یک هزار غیرنظامی که در عرصه&zwnj;های مدیریت مالی، تدارکات و مدیریت منابع بشری آموزش دیده&zwnj;اند، در وزارت&zwnj;های دفاع و امور داخله توظیف خواهند شد؛ در قدم بعدی، زمینه آموزش&zwnj;های بیش&zwnj;تر در زمینه سیستم&zwnj;های اعتباری، نظارت و تفتیش نیز برای آنان فراهم خواهد گردید. سرباز و پولیس مستحق اینها هستند و در جیره روزانه، یونیفورم، لوجستیک و حمایت آنان نباید تقلب صورت گیرد.</p>\r\n<p>ضرورت مفهوم&zwnj;سازی نظم و قانون، به صورت اساسی ارتباط نزدیکی با اصلاحات در بخش امنیتی دارد. در کمتر از یک سال، ستره&zwnj;محکمه و اداره لوی&zwnj;سارنوالی پیشرفت&zwnj;های چشمگیری داشته&zwnj;اند که از آن جمله می&zwnj;توان به آموزش کارمندان جدید در عرصه قانون که از آنها امتحان اخذ گردید و ارزیابی شدند؛ پیگیری و نظارت بهتر قضایا؛ تلاش&zwnj;های تازه به خاطر پایان دادن به مصونیت در زمینه جرایم علیه زنان؛ و مشارکت عامه بیش&zwnj;تر در سکتور عدلی اشاره نمود.</p>\r\n<p>ستره&zwnj;محکمه و سارنوالی اجندای اصلاحات همه&zwnj;جانبه را برای سال 1400 ه&zwnj;.ش روی دست گرفته&zwnj;اند و ما به منظور حصول اطمینان از تحکیم و دوام روند اصلاحات، مشتاقانه منتظر مشارکت&zwnj; جامعه بین&zwnj;المللی هستیم. اختیارات به کمیسیون خدمات ملکی احیاشده تفویض می&zwnj;گردد تا روند استخدام و تقرر افراد را از طریق یک پروسه شفاف تکمیل سازد.</p>\r\n<p>من به آقای نادری به خاطر تجربه اخیرشان در تقرر بیش از 400، دقیقاً 492، تن در اداره تذکره الکترونیکی تبریک می&zwnj;گویم. این تجربه از اقدامات آینده در این راستا نوید می&zwnj;دهد. 25 هزار متقاضی در این پروسه اشتراک کردند و افراد از 33 ولایت موفق به سپری نمودن امتحان شدند. پنج هزار بست دیگر نیز از طریق پروسه مشابه در ماه&zwnj;های آینده پر خواهد شد. علاوه بر آن، 8 هزار معلم نیز از همین طریق جذب خواهند شد. تمامی بست&zwnj;های معینیت مالی و اداری در تمام سطوح حکومت و سِمَت&zwnj;های ارشد در دفتر ریاست&zwnj;جمهوری، وزارت امور خارجه، ستره&zwnj;محکمه و اداره لوی&zwnj;سارنوالی نیز از همین پروسه خواهند گذشت. استخدام شفاف باید یک اصل باشد، نه استثنا. من کاملاً آماده صدور اجازه تقرر در تمامی بست&zwnj;های ارشد هستم که نیاز به امضای من دارند تا از طریق یک پروسه رقابتی انجام شوند. امیدوارم در این زمینه به توافق نظر دست یابیم.</p>\r\n<p>روند تصمیم&zwnj;گیری، بیش از حد در کابل متمرکز است. به منظور تأمین امنیت، ارائه بهتر خدمات و تشخیص نیازمندی به دانش و تفاهم محلی، ما در حال انتقال ساختار حکومتی بوده و توجه بیش&zwnj;تری را به سطح محلی متمرکز ساخته&lrm;ایم. از میثاق شهروندی گرفته تا پالیسی حکومتداری محلی، ما می&zwnj;خواهیم مطمئن گردیم که شهروندان در مرکز پروسه&zwnj;ی انکشافی قرار دارند و نقش کلیدی را در پاسخگو بودن حکومت ایفا می&zwnj;کنند. ما باید به خاطر ارائه خدمات به قریه، ساختار مرکز را تغییر دهیم، نه این که قریه را تحت اثر مرکز بیاوریم.</p>\r\n<p>افغانستان یک کشور دموکراتیک است که به صورت ذاتی، خصوصیت مشارکتی دارد. تفویض حق تصمیم&zwnj;گیری به سطح درست آن و داشتن اطمینان به حمایت از ضعیف&zwnj;ترین سطح حکومتداری، امری ضروری است؛ چراکه کلید تأمین امنیت اداره در سطح ولسوالی است. ضعف&zwnj;های ما و فقدان نهادهای نظم و قانون در سطح ولسوالی&zwnj;ها باید در کانون توجه ما قرار گیرد.</p>\r\n<p>&nbsp;</p>\r\n<p>بازارسازی</p>\r\n<p>در کنار تقویت اساسات ساختار بهتر حکومتداری، ما نیاز خواهیم داشت که در زمینه بازارسازی و انکشاف نیز اطمینان حاصل کنیم. ما باید از یک مودل توازن&zwnj;محور به طرف مودل متمرکز بر رشد حرکت کنیم. از اکلیل حکیمی وزیر مالیه و همکاران&zwnj; ایشان به خاطر جمع&zwnj;آوری عواید در وضعیت دشوار، بی&zwnj;نهایت سپاس&zwnj;گزارم؛ اما اکنون، اولویت ما باید رشد دوامدار باشد. عواید، همه چیز نیست؛ رشد پایدار که تضمین&zwnj;کننده عواید دوامدار است، همه چیز است.</p>\r\n<p>اجمل احمدی، همکارم، [مشاور ارشد رئیس&zwnj;جمهور در امور مالی] در مورد یک مودل سرمایه&zwnj;گذاری به منظور اطمینان از این که ما می&lrm;توانیم رو به جلو حرکت کنیم، با شما صحبت خواهد کرد.</p>\r\n<p>حکومت اقدامات جدی را به خاطر کاهش مصارف و مسؤولیت&zwnj;های اداری روی دست خواهد گرفت؛ و در چارچوب قانون اساسی و مقررات ما، سرمایه&zwnj;گذاری سکتور خصوصی را رشد خواهد داد. به منظور ارتقای سرمایه&zwnj;گذاری خارجی ما یک هیئت عالی&zwnj;رتبه را ایجاد خواهیم کرد که صلاحیت کار در بخش حمایت از سرمایه&zwnj;گذاران بین&zwnj;المللی که به افغانستان می&zwnj;آیند؛ کاهش تشریفات اداری و تثبیت حقوق مالکیت داشته باشند. همکارم جواد پیکار [رئیس اداره مستقل اراضی افغانستان] در مورد حقوق مالکیت با شما صحبت خواهد کرد. یک برنامه عالی به خاطر این که برخورداری شهروندان افغان از حقوق مالکیت مستحکم را تضمین کند، در حال اجرا می&zwnj;باشد. ما و وزیر معادن پرتلاش و جدیدمان خانم نرگس نهان، پیش&zwnj;بینی می&zwnj;کنیم که گسترش عمده&zwnj;ای در آفرهای [= پیشنهادات] منرالی تحت یک رژیم سرمایه&zwnj;گذاری مطلوب و شفاف رونما گردد که از یک سو موجب افزایش عواید دولت به خاطر اهداف عامه می&zwnj;شود و از سوی دیگر منجر به تشویق سرمایه&zwnj;گذاری در عرصه تکنالوژی استخراجی، اکتشاف قانونی و خاتمه دادن به سوءاستفاده و قاچاق مواد منرالی می&zwnj;گردد.</p>\r\n<p>آب، یکی دیگر از منابع عمده افغانستان می&zwnj;باشد. حکومت اساسات قانونی را به خاطر بهره&zwnj;برداری بهتر از این منبع ایجاد خواهد نمود. ما، پیش از این، روی زیربناهای آبیاری و بندهای آبی به خاطر افزایش بهره&zwnj;وری زراعتی سرمایه&zwnj;گذاری کرده&zwnj;ایم؛ و با تکمیل دیزاین تخنیکی، ما به سرمایه&zwnj;گذاری در این سکتور &nbsp;که کلید رشد و کاهش فقر است، سرعت خواهیم بخشید. هدف ما تحت کنترول درآوردن 18 میلیارد مترمکعب آب است که این کار را انجام خواهیم داد و انجام می&zwnj;شود.</p>\r\n<p>یکی از دستاوردهایی که از زمان فعالیتم به عنوان وزیر مالیه به آن مفتخرم، گشایش سکتور مخابرات به روی فراهم&zwnj;کنندگان خصوصی بود که نتیجه آن روی کار آمدن چشمگیر موبایل&zwnj;های هوشمند، اتصال به انترنت، و توانایی مکالمه افغان&zwnj;ها در سرتاسر کشور و خارج از آن می&zwnj;باشد. حالا ما باید به مرحله بعدی حرکت کنیم. سال گذشته، ما &laquo;پالیسی دسترسی باز&raquo; را توشیح کردیم. تا ختم این هفته، من حکمی را امضا می&zwnj;نمایم که این پالیسی را به مرحله تطبیق می&zwnj;گذارد. این [زمان دربرگرفته&zwnj;شده] شاید تا حدودی بروکراسی به نظر آید، اما بعضی افراد هوشیار می&zwnj;دانند که این حکم ساده، دوصد میلیون دالر و یا بیش از آن، به سرمایه&zwnj;گذاری خصوصی می&zwnj;افزاید؛ قیمت&zwnj;ها را کاهش می&zwnj;دهد؛ و کیفیت را برای مصرف&zwnj;کنندگان افغان در سه سال اول، بهبود می&zwnj;بخشد.</p>\r\n<p>ما به سرمایه&zwnj;گذاری خویش در عرصه&zwnj;هایی که منجر به همکاری منطقوی همانند دهلیزهای ترانسپورتی، خطوط برق، پایپ&zwnj;لاین&zwnj;ها، خطوط آهن و سرک&zwnj;ها می&zwnj;گردند، ادامه خواهیم داد. تاپی و کاسا1000 پروژه&zwnj;های بزرگی&zwnj;اند که به&zwnj;خوبی پیش می&zwnj;روند و اساس استراتیژی درازمدت رشد ما را تشکیل خواهند داد. آنها باید موفق گردند. ما از آنها داستان&zwnj;هایی خواهیم ساخت که حکایت کنند چگونه یک افغانستان باثبات می&zwnj;تواند باعث غنی&zwnj;تر شدن آسیای مرکزی گردد، در حالی که این امر در موجودیت یک افغانستان بی&zwnj;ثبات، هرگز امکان&rlm;پذیر نخواهد بود.</p>\r\n<p>می&zwnj;خواهم به همکارم داکتر قیومی [مشاور ارشد رئیس&zwnj;جمهور در امو زیربناها] به خاطر رسیدن به این هدف تنها در دو و نیم سال، تبریک بگویم. افغانستان بعد از یک دوره 130 ساله، دوباره، با قدرت به آسیای مرکزی ملحق شد. اکنون اقتصادهای ما &ndash; افغانستان و آسیای میانه &ndash; با هم مرتبط هستند. آنها در حال مبدل شدن به بزرگ&lrm;ترین شرکای تجاری ما هستند و اعتماد آنها چه در هر زمینه کاسا1000، تاپی یا خطوط آهن باشد، تغییر چشمگیری را در جهت&zwnj;دهی به ما ایجاد کرده است.</p>\r\n<p>کلید وصل شدن آسیای میانه به آسیای جنوبی، پیروی تمام منطقه از قوانین سازمان تجارت جهانی (WTO) است. تجارت بر اساس خاستگاه یا محدودیت&zwnj;ها نه، بلکه باید به صورت آزادانه جریان داشته باشد. تمام ما در سیستمی که در آن تجارت و ترانزیت یکجا شده، برنده خواهیم بود. ما روی دیدگاه انتقال پنج هزار الی پنجاه&zwnj; هزار میگاوات انرژی برق از آسیای مرکزی به آسیای جنوبی کار می&zwnj;کنیم. عواید برخاسته از انتقال دو هزار میگاوات برق با عواید گمرکات در کشور برابری خواهد کرد.</p>\r\n<p>ما با اتخاذ روش&zwnj;های جدید در این باره تأمل می&zwnj;کنیم و خود را وقف آن ساخته&lrm;ایم، اما رژیم سرمایه&zwnj;گذاری باید در اولویت قرار گیرد. در حال حاضر، صندوق بین&zwnj;&zwnj;&zwnj;&zwnj;&zwnj;&zwnj;&zwnj;&zwnj;المللی پول (IMF) بر اساس سرمایه&zwnj;گذاری دولتی و خصوصی در افغانستان سه درصد رشد را پیش&zwnj;بینی نموده است. در قدم بعد، با بهره&zwnj;برداری از فرصت&zwnj;هایی که در مقابل ما قرار دارد، تسریع روند اصلاحات و بهبود اجرای بودجه، می&zwnj;تواند رشد ما را به پیمانه 3 الی 6 درصد بیش&zwnj;تر افزایش دهد.</p>\r\n<p>آقای اجمل احمدی یک مودل سرمایه&zwnj;گذاری را که اختصاص منابع به صورت کارا و تطبیق مؤثر آنها را تضمین می&zwnj;کند، انکشاف داده است که آن را با شما شریک خواهد ساخت.</p>\r\n<p>&nbsp;</p>\r\n<p>ملت&zwnj;سازی</p>\r\n<p>در کنار بازارسازی، ما باید یک ملت متحد نیز بسازیم. ملت، عبارت از یک جامعه اخلاقی می&zwnj;باشد. ملت&zwnj;سازی نیازمند پرورش احساس عمیق تحمل به خاطر گفت&zwnj;وگو و بحث&zwnj;های آزاد می&zwnj;باشد. جامعه&zwnj;ای همانند جامعه ما که تقریباً چهل سال جنگ مداوم را تجربه کرده است، نیاز دارد که ظرفیت شنیدن و درک رنج&zwnj;ها و زخم&zwnj;های گذشته را که آینده&zwnj;ی ما را تعقیب می&zwnj;کند، در خود پرورش دهد. در صورتی که ما بر گذشته غالب نشویم، از آینده نیز محروم خواهیم شد.</p>\r\n<p>من، داکتر عبدالله و همه ما، مصمم هستیم که اطمینان یابیم آینده از آن ماست و ما قربانیان گذشته نیستیم. افغانستان یک جامعه&zwnj;ی ذی&zwnj;نفع است. مشوره در این کشور یک امر حتمی و ضروری است. به عنوان رئیس&zwnj;جمهور و به عنوان یک شهروند، پی برده&zwnj;ام که خِرد جمعی یک امر عالی و بسیار سازنده است؛ بنابراین، من خودم را به ایجاد یک استراتیژی رجوع سرتاسری مردمی به خصوص با شامل ساختن علما، بزرگان، جوانان، زنان، فقرا و جامعه تجاری&zwnj;مان، متعهد می&zwnj;دانم.</p>\r\n<p>احساس نارضایتی، شکل لسانی، سمتی و هویتی به خود می&zwnj;گیرد. ما نمی&zwnj;توانیم نابودی مخفی برخاسته از قطب&zwnj;بندی هویتی را دست&zwnj;کم بگیریم. مثل همیشه، رهبران بی&zwnj;پروا و متشبثینی که منافع ملی را قربانی منفعت شخصی&zwnj;شان می&zwnj;کنند، می&zwnj;توانند یک جامعه پولاریزه را دستکاری کنند. ما نمی&zwnj;توانیم اجازه چنین کاری را بدهیم. اما ما همچنین باید تصدیق کنیم که نارضایتی&zwnj;های هویتی، پیچیده و به صورت عمیقی محسوس است که بیش&zwnj;تر استوار بر بی&zwnj;توجهی و تبعیضی است که از گذشته بر جا مانده است. حکومت وحدت ملی نمی&zwnj;تواند اجازه دهد که این زهر گسترش یابد.</p>\r\n<p>به عنوان بخشی از مشوره&zwnj;ها و رجوع به مردم، من یک گفتمان ملی را که نگرانی&zwnj;های مردم را مشخص خواهد ساخت، رهبری خواهم کرد تا بتوانیم با آنان به صورت آزادانه بحث کنیم و به صورت جمعی از قطب&zwnj;بندی&zwnj; &zwnj;شدن کشورمان جلوگیری کنیم.</p>\r\n<p>در بخش&zwnj;هایی همانند پالیسی&zwnj;ها، سرمایه&zwnj;گذاری&zwnj;ها و کارمندان حکومت که تحت کنترول ماست، ما به دقت اوضاع را بررسی می&zwnj;کنیم تا اطمینان یابیم با تمامی اقشار به صورت عادلانه رفتار می&zwnj;شود و به عنوان یک شهروند برابر (با شهروند دیگر) &ndash; که حق هر افغان بوده و قانون اساسی آن را تضمین کرده &ndash; از وی نمایندگی شده است.</p>\r\n<p>در یک حکومت مبتنی بر دموکراسی، انتخابات آزاد و عادلانه، میکانیزم کلیدی به خاطر پاسخگو ساختن حکومت است. کمیسیون مستقل انتخابات تصمیم خود مبنی بر برگزاری انتخابات پارلمانی در جولای 2018 [سرطان 1397] را اعلام کرده است. من و حکومت وحدت ملی به صورت همه&zwnj;جانبه از کمیسیون انتخابات حمایت همه&zwnj;جانبه می&zwnj;نماییم تا انتخابات را با استقلالیت و بی&zwnj;طرفی و به صورت عادلانه و فراگیر برگزار کند. به خاطر تحقق این هدف، باید مشوره&zwnj;های فشرده بین کمیسیون مستقل انتخابات، نهادهای جامعه مدنی، نهادهای زنان و جوانان، احزاب سیاسی، علما و دیگر اقشار جامعه ما و جامعه بین&zwnj;المللی وجود داشته باشد. من به رسانه&zwnj;ها و احزاب سیاسی&zwnj;مان تأکید دارم که از انتخابات پارلمانی آینده به خاطر راه&zwnj;اندازی گفت&zwnj;وگوهای ملی همه&zwnj;جانبه درباره مشکلات ما و راه&zwnj;حل&zwnj;های بالقوه استفاده کنند.</p>\r\n<p>آمادگی برای انتخابات ریاست جمهوری سال 2019 نیز باید به&zwnj;زودی آغاز گردد. ما اطمینان می&zwnj;دهیم که جدول زمانی و معیاراتی که کمیسیون اتخاذ کرده، تطبیق می&zwnj;گردند. یک پلان عمل طی سه هفته آینده با مردم و جامعه بین&zwnj;المللی شریک خواهد شد. این پلان عمل شامل قوانینی به منظور دسترسی عادلانه به رسانه&zwnj;ها خواهد بود. این انتخابات فرصت را برای نسلی که به خاطر ورود به عرصه سیاسی به بلوغ رسیده فراهم می&zwnj;کند. ایجاد یک گفتمان عامه به خاطر رسیدن به اطمینان نسبت به وجود یک عرصه برابر و مساوی برای همه نیز باید یک اولویت باشد.</p>\r\n<p>نظارت یک مسأله حیاتی به خاطر اعتبار انتخابات است. ما از تمامی گروه&zwnj;های جامعه، به ویژه نهادهای جامعه مدنی، می&zwnj;خواهیم که در یک گفت&zwnj;وگو روی نظارت از انتخابات سهم بگیرند و در این راستا سیستم&zwnj;ها و پروسه&zwnj;های عادلانه ایجاد کنند. ما به همین ترتیب از جامعه بین&zwnj;المللی می&zwnj;خواهیم که به منظور ایجاد یک میکانیزم قوی و معتبر نظارت بر انتخابات، به ما ملحق شده و به ما کمک کنند.</p>\r\n<p>&nbsp;</p>\r\n<p>صلح&zwnj;سازی</p>\r\n<p>حکومت وحدت ملی از زمان ایجاد به یک دیدگاه صلح متعهد بوده است. ما سرمایه سیاسی و زندگی&zwnj;مان را به خاطر تأمین صلح تقدیم کرده&zwnj;ایم؛ اما دستی که ما برای صلح دراز کردیم، هنوز گرفته نشده است. همچنین، درخواست ما به خاطر تضمین بی&zwnj;طرفی روابط دولت با دولت همراه پاکستان هنوز تحقق نیافته است. ما مصمم به تأمین صلح هستیم، اما جامعه بین&zwnj;المللی باید درک کند که تحمل مردم ما به خاطر این ویرانی&zwnj;ها به سر خواهد رسید.</p>\r\n<p>گروه&zwnj;های طالبان، باید بدانند که زمان به نفع&zwnj;شان نیست. آنان می&zwnj;توانند صلح و آشتی واقعی را بپذیرند، و یا آماده باشند که از طرف جامعه جهانی به عنوان یک سازمان تروریستی در دسته&zwnj;بندی قرار گیرند.</p>\r\n<p>جامعه بین&zwnj;المللی باید واضح بسازد که وقتی تمامی نورم&zwnj;های پذیرفته&zwnj;شده نقض می&zwnj;شوند، و سفارت&zwnj;خانه&zwnj;ها و دیپلوماتان به صورت عمدی مورد حمله قرار می&zwnj;گیرند، سکوت نمی&zwnj;تواند پاسخی برای آن باشد.</p>\r\n<p>ما در خط مقدم نبرد برای دفاع از استقلال کشورمان و امنیت جهانی قرار داریم. چالش&lrm;ها واضح است و در صورتی که ما با قاطعیت، انسجام و در جهت مشخص عمل نکنیم، بدتر از این خواهند شد.</p>\r\n<p>ملت اراده&zwnj;اش را به ما تثبیت کرده است. اکنون این به ما، یعنی خدمت&zwnj;گزاران مردم، تعلق می&zwnj;گیرد تا دولت را به عنوان ابزاری برای تحول کشور &ndash; آنچه مردم و هموطنان&zwnj;مان آرزو دارند &ndash; مبدل سازیم.</p>\r\n<p>ما باید به فساد پایان دهیم.</p>\r\n<p>ما باید عدالت را تأمین کنیم.</p>\r\n<p>ما باید اطفال&zwnj;مان را آموزش دهیم.</p>\r\n<p>و ما باید صلح را تأمین کنیم.</p>\r\n<p>آنچه جامعه بین&zwnj;المللی از ما می&zwnj;خواهد، همان است که مردم ما می&zwnj;خواهند. جامعه بین&zwnj;المللی هیچ&zwnj;گونه اجندای بیرونی ندارد. شرایطی که ما پیشنهاد می&zwnj;دهیم، شرایط خودمان است؛ بنابراین اراده ما است که شرایطی که خودمان پیشنهاد کرده&zwnj;ایم را برآورده سازیم.</p>\r\n<p>بیایید متحد شویم تا آینده را برای نسل بعدی مصون بسازیم. یک افغانستان باثبات به نفع همه است و این کشور تکیه&zwnj;گاهی برای امنیت جهانی بوده و مکانی خواهد بود که در آن شرق و غرب، شمال و جنوب، با هم یکجا می&zwnj;شوند؛ همان طور که برای هزاران سال اینگونه بوده است.</p>\r\n<p>تشکر از شما. [تشویق حاضرین]</p>\r\n<p><img src=\"http://ocs.gov.af/images/1378.jpg\" width=\"611\" height=\"259\" /></p>', NULL, 'president', 'statement', 8),
(31, NULL, 'افغانستان از لحاظ سیاسی، شاهد یکی از بهترین تغییرات نسلی است. نیمی از کابینه ما کمتر از چهل سال، سن دارند. این امر برای کشوری که چهل سال درگیر جنگ بود', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'president', 'word', 9),
(32, NULL, 'روند صلح اجتماعی به رهبری زنان از طریق کمیته‌های ولایتی عملی می‌شود', NULL, NULL, '1396 - 08 - 11', NULL, NULL, 'در جلسه‌ای با حضور خانم اول محترمه بی‌بی‌گل غنی و محترمه حبیبه سرابی عضو شورای عالی صلح و اشتراک فعالین زن در  عرصه صلح، ضمن ایجاد تعدادی از کمیته‌های ولایتی روند صلح اجتماعی به رهبری زنان، اهداف و فعالیت‌های این کمیته‌ها تشریح شد.', NULL, NULL, '<p style=\"text-align: right;\">در جلسه&zwnj;ای با حضور خانم اول محترمه بی&zwnj;بی&zwnj;گل غنی و محترمه حبیبه سرابی عضو شورای عالی صلح و اشتراک فعالین زن در&nbsp; عرصه صلح، ضمن ایجاد تعدادی از کمیته&zwnj;های ولایتی روند صلح اجتماعی به رهبری زنان، اهداف و فعالیت&zwnj;های این کمیته&zwnj;ها تشریح شد.</p>\r\n<p style=\"text-align: right;\">خانم اول در این نشست با ایراد سخنرانی ضمن اشاره به باورمندی به توانایی و فعالیت زنان در کشور، بر ایفای نقش فعال آنان در تأمین صلح از طریق پرداختن به پروسه صلح اجتماعی مطابق قطع&zwnj;نامه چهارمین سمپوزیم زنان افغان تحت عنوان &laquo;زنان افغان پیام&zwnj;آوران صلح&raquo; تأکید نمود.</p>\r\n<p style=\"text-align: right;\">خانم اول گفت که کشور ما در حالت جنگ، نیاز شدید به تأمین صلح دارد؛ بنابراین همه ما باید نقش فعالی در این پروسه داشته و راه&zwnj;حل&zwnj;ها و مسیر تفاهم را جست&zwnj;وجو نماییم.</p>\r\n<p style=\"text-align: right;\">وی افزود که زنان در تربیت اطفال و از طریق آن در پرورش روحیه صلح و آشتی در جامعه، نقش بنیادی دارند.</p>\r\n<p style=\"text-align: right;\">خانم اول از زنان خواست که با درک مسؤولیت، بر پا ایستاده و از هیچ نوع سعی و تلاشی دریغ نورزند.</p>\r\n<p style=\"text-align: right;\">در این جلسه بر فعالیت در راستای صلح اجتماعی به رهبری زنان به سطوح کمیته&zwnj;ها و هماهنگی بین آنها تأکید شد.</p>\r\n<p style=\"text-align: right;\">طبق فیصله&zwnj;ی قطع&zwnj;نامه چهارمین سمپوزیم زنان افغان، کمیته&zwnj;های ولایات کابل، لوگر، میدان&zwnj;وردک و پروان در این نشست ایجاد شدند.</p>\r\n<p style=\"text-align: right;\">قابل ذکر است که کمیته&zwnj;های ولایات ننگرهار، لغمان، نورستان، کنر و هرات قبلاً طی سفر مشاورین دفتر خانم اول به این ولایات ایجاد شده بودند و کمیته&zwnj;های سایر ولایات نیز در آینده نزدیک ایجاد می&zwnj;گردند.</p>\r\n<p style=\"text-align: right;\">این کمیته&zwnj;ها با هدف ترویج ذهنیت مسؤولیت&zwnj;پذیری شهروندی در قبال صلح اجتماعی، در چارچوب پلان عمل تدوین&zwnj;شده، 31 فعالیت را عملی خواهند نمود.</p>\r\n<p style=\"text-align: right;\">فعالیت&zwnj;های پلان عمل شامل مواردی چون همکاری با ارگان&zwnj;های امنیتی، ایفای نقش سفیران صلح، دادخواهی، آگاهی&zwnj;دهی، جلوگیری از پیوستن افراد به گروه&zwnj;های مخالف، حمایت از زنان پولیس و اردوی ملی، الگوسازی برای اطفال و جوانان و... می&zwnj;باشد.</p>\r\n<p style=\"text-align: right;\">چهارمین سمپوزیم زنان افغان تحت عنوان &laquo;زنان افغان پیام&zwnj;آوران صلح&raquo; توسط دفتر خانم اول به تاریخ 25 الی 27 ثور 1396 در کابل تدویر یافته بود که با صدور قطع&zwnj;نامه شش ماده&zwnj;یی پایان یافت.</p>', NULL, 'media', 'news', 18),
(33, NULL, 'تعهدات برنامه عمل ملی مشارکت دولتداری باز کشور تصویب شد', NULL, NULL, '1396 - 08 - 11', NULL, NULL, 'نخستین نشست مجمع عمومی مجتمع مشارکت دولتداری باز افغانستان به ریاست عبدالسبحان رؤوف معاون پالیسی، نظارت، و بررسی ریاست عمومی دفتر مقام عالی ریاست جمهوری و رئیس مجتمع مشارکت دولتداری', NULL, NULL, '<p style=\"text-align: right;\">نخستین نشست مجمع عمومی مجتمع مشارکت دولتداری باز افغانستان به ریاست عبدالسبحان رؤوف معاون پالیسی، نظارت، و بررسی ریاست عمومی دفتر مقام عالی ریاست جمهوری و رئیس مجتمع مشارکت دولتداری باز افغانستان برگزار و 1+10 تعهد برنامه عمل ملی مشارکت دولتداری باز افغانستان در آن تصویب شد.</p>\r\n<p style=\"text-align: right;\">در این جلسه مجمع عمومی، معینان پلان و پالیسی وزارت&zwnj;ها و اداره&zwnj;های مستقل دولتی و دیگر ارگان&zwnj;های ذی&zwnj;ربط و نهادهای مدنی و خصوصی، روی 14 تعهد ارائه&zwnj;شده برای گنجانیدن در برنامه عمل ملی، یک به یک بحث نمودند و در نهایت 1+10 تعهد را به تصویب رساندند.</p>\r\n<p style=\"text-align: right;\">پیش&zwnj;تر چندین نشست میان نهادهای جامعه مدنی و رئیسان پلان و پالیسی وزارت&zwnj;ها و اداره&zwnj;های مستقل دولتی به منظور تدوین برنامه عمل ملی برگزار شده بود که در نتیجه بیش از 24 تعهد برای شامل&zwnj;سازی در برنامه عمل ملی پیشنهاد شد. پس از آن، در نشست سه&zwnj;روزه مجتمع مشارکت دولتداری باز افغانستان (22 &ndash; 24 میزان 1396) از مجموع تعهدات ارائه&zwnj;شده و پیشنهادی جدید، 14 تعهد غرض تصویب در مجمع عمومی تأیید شد.</p>\r\n<p style=\"text-align: right;\">در جلسه مجمع عمومی معینان پلان و پالیسی وزارت&zwnj;ها و اداره&zwnj;های تعهدکننده درباره تعهدات معلومات ارائه کرده و به سؤال&zwnj;ها پاسخ دادند. سرانجام 1+10 تعهد در مجمع عمومی تصویب شد که شامل موارد ذیل می&zwnj;باشد:</p>\r\n<p style=\"text-align: right;\">1. بازنگری و تطبیق میکانیزم مشارکت عامه در روند بررسی؛&nbsp;</p>\r\n<p style=\"text-align: right;\">2. بازنگری قانون طرز طی مراحل، نشر و انفاذ اسناد تقنینی؛</p>\r\n<p style=\"text-align: right;\">3. ایجاد محاکم اختصاصی رسیدگی به جرایم خشونت علیه زنان در دوازده ولایت؛</p>\r\n<p style=\"text-align: right;\">4. توسعه شوراهای مشارکت پولیس و مردم؛</p>\r\n<p style=\"text-align: right;\">5 . تدوین طرح ایجاد سازمان اعتباردهی عرضه خدمات صحی در کشور و تطبیق آن؛</p>\r\n<p style=\"text-align: right;\">6. تدوین پالیسی ملی بهسازی و احیای شهری؛</p>\r\n<p style=\"text-align: right;\">7. ثبت، نشر و تدقیق دارایی&zwnj;های 100 مقام عالی&zwnj;رتبه دولتی؛</p>\r\n<p style=\"text-align: right;\">8. ایجاد کمیته مشترک نهادهای دولتی و جامعه مدنی برای نظارت از اجرای استراتیژی مبارزه با فساد اداری؛</p>\r\n<p style=\"text-align: right;\">9. تدوین طرح نظارت جامعه مدنی بر کیفیت و شفافیت تعلیم و تحصیل؛</p>\r\n<p style=\"text-align: right;\">10. تدوین طرحی برای محافظت از زنان در شرایط جنگ و حالات اضطرار؛ و</p>\r\n<p style=\"text-align: right;\">11. تدوین مکانیزم تقویت واحدهای دسترسی به اطلاعات در 59 اداره دولتی (تعهد اضافه)؛</p>\r\n<p style=\"text-align: right;\">این تعهدات پس از تصویب کابینه دولت جمهوری اسلامی افغانستان شامل اولین برنامه عمل ملی مشارکت دولتداری باز کشور می&zwnj;شود و در مدت دو سال اجرا می&zwnj;گردد.</p>', NULL, 'media', 'news', 19),
(34, NULL, 'خلاصه گزارش حکومت به شورای ملی ۱۳۹۴', NULL, NULL, '1396 - 08 - 11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'documents', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_dr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_pa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_en` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_dr` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_pa` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc_dr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc_pa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_dr` text COLLATE utf8mb4_unicode_ci,
  `description_pa` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('domestic','international') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `title_en`, `title_dr`, `title_pa`, `date_en`, `date_dr`, `date_pa`, `short_desc_en`, `short_desc_dr`, `short_desc_pa`, `description_en`, `description_dr`, `description_pa`, `image`, `type`) VALUES
(1, NULL, NULL, 'هند په لومړي ځل د چابهار له لارې افغانستان ته غنم ولېږل', NULL, NULL, '1396 - 08 - 09', NULL, NULL, 'هند په لومړي ځل د چابهار له لارې افغانستان ته غنم ولېږل', NULL, NULL, '<p>هند په لومړي ځل د چابهار له لارې افغانستان ته غنم ولېږل</p>', '1.jpg', 'domestic'),
(2, NULL, NULL, 'هند په لومړي ځل د چابهار له لارې افغانستان ته غنم ولېږل', NULL, NULL, '1396 - 08 - 22', NULL, NULL, 'هند په لومړي ځل د چابهار له لارې افغانستان ته غنم ولېږل', NULL, NULL, '<p>هند په لومړي ځل د چابهار له لارې افغانستان ته غنم ولېږل</p>', '2.jpg', 'international');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','author','editor') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(14, 'Test', 'test@test.com', '$2y$10$Aqyr7C3WsHQILCJ0.9ObGOhp.2jxLFkarN17i65jL.7lVDqqatJMq', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_dr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_pa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_en` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_dr` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_pa` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_dr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_pa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title_en`, `title_dr`, `title_pa`, `date_en`, `date_dr`, `date_pa`, `url_en`, `url_dr`, `url_pa`) VALUES
(1, NULL, 'از حرف تا عمل | سیاست خارجی و دستاورد ها', 'از حرف تا عمل | مبارزه با فساد و دستاورد ها', NULL, '1396 - 08 - 11', '1396 - 08 - 11', NULL, 'pyK-0m1s8P4', 'pyK-0m1s8P4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `album_image`
--
ALTER TABLE `album_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biography`
--
ALTER TABLE `biography`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chief`
--
ALTER TABLE `chief`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expert_registeration`
--
ALTER TABLE `expert_registeration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infographics`
--
ALTER TABLE `infographics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journalist_registeration`
--
ALTER TABLE `journalist_registeration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_directorate`
--
ALTER TABLE `media_directorate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_registeration`
--
ALTER TABLE `media_registeration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_staff`
--
ALTER TABLE `media_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ocs`
--
ALTER TABLE `ocs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `president`
--
ALTER TABLE `president`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presidential_palace`
--
ALTER TABLE `presidential_palace`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search_table`
--
ALTER TABLE `search_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `album_image`
--
ALTER TABLE `album_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `biography`
--
ALTER TABLE `biography`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `chief`
--
ALTER TABLE `chief`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `expert_registeration`
--
ALTER TABLE `expert_registeration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `infographics`
--
ALTER TABLE `infographics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `journalist_registeration`
--
ALTER TABLE `journalist_registeration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `media_directorate`
--
ALTER TABLE `media_directorate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `media_registeration`
--
ALTER TABLE `media_registeration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `media_staff`
--
ALTER TABLE `media_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ocs`
--
ALTER TABLE `ocs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `president`
--
ALTER TABLE `president`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `presidential_palace`
--
ALTER TABLE `presidential_palace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `search_table`
--
ALTER TABLE `search_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
