-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2014 at 05:54 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `incidents`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_articles`
--

CREATE TABLE IF NOT EXISTS `tbl_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `framecode` varchar(50) NOT NULL COMMENT 'the frame name customer will use to edit site',
  `content` varchar(3000) NOT NULL DEFAULT '' COMMENT 'the content, can include html markup',
  `framename` varchar(50) NOT NULL DEFAULT 'not defined',
  `type` int(3) NOT NULL DEFAULT '0' COMMENT '0-viewable, 1-meta, 2-text, 3-slideshow',
  PRIMARY KEY (`id`),
  UNIQUE KEY `framecode` (`framecode`,`framename`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `tbl_articles`
--

INSERT INTO `tbl_articles` (`id`, `framecode`, `content`, `framename`, `type`) VALUES
(8, 'metaTitle', 'Solar panel installation | Get the best deal on solar panels', 'Meta Tag Title', 1),
(9, 'metaDescription', 'Save big on your monthly utility bill when solar installers compete for your roof on Gridbid. Click here to find out how to get the best deal.', 'Meta Tag Description', 1),
(10, 'metaKeywords', 'solar panel installation,solar installation, solar installers,residential solar installation,solar installers in California,solar estimate, solar auction', 'Meta Tag Keywords', 1),
(11, 'roofH1', '<div style="font-size:62px;font-weight:bold;line-height:55px;width:350px;">Get the best deal on solar</div>', 'roof Header 1', 0),
(12, 'roofH2', '<p style="margin-top:20px;margin-bottom:20px;font-size:16px;line-height:25px;">Auction your roof for free to get multiple offers from solar installers and save on rooftop solar</p>', 'roof Header 2', 0),
(13, 'roofAuctionButtonText', 'See How Much You Can Save', 'Roof Landing Page Auction Button Text', 2),
(14, 'solarRedirectStatic', 'Are you a solar contractor?  ', 'Solar Redirect Static Text', 2),
(15, 'solarRedirectLink', 'Get exclusive solar leads<br />', 'Solar Redirect Link', 2),
(16, 'roofCaption1', 'Find the right installer, fast', 'Roof Page Caption 1', 2),
(17, 'roofCaption2', 'Auction any size of project', 'Roof Page Caption 2', 2),
(18, 'roofCaption3', 'Guarantee your best deal', 'Roof Page Caption 3', 2),
(19, 'roofCaption4', 'Compare bids side-by-side', 'Roof Page Caption 4', 2),
(20, 'metaDescriptionLanding', 'Save big on your solar panel installation when solar installers compete online for your roof. Click Here Now to find out how to get \r\nthe best deal!', 'Meta Description Landing Page', 1),
(21, 'metaKeywordsLanding', 'solar panels installation,solar power system, solar \r\ninstaller, residential solar, solar auction', 'Meta Keywords Landing Page', 1),
(22, 'metaDescriptionContactUs', 'Contact Us<br />', 'Meta Description Contact Us', 1),
(23, 'metaKeywordsFaq', 'FAQ, Gridbid FAQs', 'Meta Keywords FAQ', 1),
(24, 'metaDescriptionFaq', 'Here are a few frequently asked questions about Gridbid.', 'Meta Description FAQ', 1),
(25, 'metaDescriptionSoco', '<br />', 'Meta Description Soco', 1),
(26, 'metaKeywordsSoco', '', 'Meta Keywords Soco Page', 1),
(27, 'aboutWhyRoof', '<h5 style="font-weight:normal;margin-bottom:30px;padding-left:35px;">Gridbid.com is a free, easy to use website where you post details about your home or building and solar installers submit competing offers or “bids” to install solar on your roof. Unlike competitors, Gridbid starts an online competition for your roof, getting you multiple bids, ranking each bid using our proprietary Gridbid Score, and allowing you to pick the best deal based on your individual needs (no group purchasing where you take a deal put together by others)</h5>', 'not defined', 0),
(28, 'aboutWhySoco', '<h5 style="font-weight:normal;margin-bottom:30px;padding-left:35px;">Gridbid gives you a place where you can search for roofs that meet your criteria and rapidly submit proposals to those home or business owners - showing off your unique characterisitics easily.  No more than four installers are allowed to bid on a roof, so at most you are competing with 3 other installers.  Unlike competitors, Gridbid charges you for leads only after you exclusively secure them.</h5>', 'not defined', 0),
(29, 'bioThomas', '<table style="font-size:10pt;margin-bottom:50px;"><tbody><tr style="vertical-align:top;"><td style="width:500px;vertical-align:top;"><div class="biotitle">Chris Hunter, CEO</div><div class="biowriteup">Chris is a recognized expert in the energy and cleantech industries. Prior to joining Gridbid, Chris was Head of Development of AMSolar and Principal at Abundance Clean Energy Partners where he advised leading renewable energy companies are market entry strategy, project development, capital raises and the structuring of financial transactions. Before that, Chris founded and served as Vice President of Climate Change Capital''s (CCC) investment business in North America. In that capacity he identified, negotiated and executed new business opportunities on behalf of the firm''s $1 billion carbon infrastructure fund. Chris has a BSc in Mechanical Engineering from Rutgers University and a Joint Executive MBA from Columbia Business School and London Business School.</div><br /><a href="http://www.linkedin.com/in/hunterchris">linkedIn</a></td></tr></tbody></table>', 'not defined', 0),
(30, 'linksThomas', 'twitter: <a href="https://twitter.com/#%21/kineshanko">@kineshanko</a>, <a href="http://ca.linkedin.com/pub/thomas-kineshanko/7/252/b1">linkedIn</a>, Telephone: +1.604.317.2756<br /><br />', 'not defined', 0),
(31, 'bioKevin', '<table style="font-family:Arial, Verdana;font-size:10pt;margin-bottom:50px;"><tbody><tr style="vertical-align:top;"><td style="width:500px;vertical-align:top;"><div class="biotitle">Thomas Kineshanko, CTO</div>\r\n<div class="biowriteup">Thomas is Canadian entrepreneur focused on using technology to solve environmental problems. Thomas is the founder of Habitat Enterprises and Radiant Carbon, co-founder of Gridbid, and a co-founding equity partner of GreenAngel Energy, North America’s first publicly traded Greentech fund. Thomas has led multiple successful rounds of venture and project finance and has worked on renewable energy projects on four continents. Thomas is a graduate of Simon Fraser University, the National University of Singapore, and was recently chosen to attend the Graduate Studies Program at Singularity University - a NASA and Google backed incubator for technology entrepreneurs that has an admissions rate six times lower than a Harvard MBA. Thomas is also a two-time academic and athletic All-American in Track &amp; Field.</div><br />twitter: <a href="https://twitter.com/#%21/kineshanko">@kineshanko</a>, <a href="http://ca.linkedin.com/pub/thomas-kineshanko/7/252/b1">linkedIn</a>, Telephone: +1.415.632.6754<br /></td>\r\n</tr></tbody></table>', 'not defined', 0),
(32, 'linksKevin', 'twitter: <a href="https://twitter.com/#!/kevinstarke">@kevinstarke</a>, <a href="http://ca.linkedin.com/pub/kevin-starke/27/ba0/400">linkedIn</a><br /><br />', 'not defined', 0),
(33, 'linkMarc', 'twitter: <a href="https://twitter.com/#!/marcbx">@marcbx</a>, <a href="http://ca.linkedin.com/pub/marc-baumgartner/3/777/1b4">linkedIn</a><br /><br />', 'not defined', 0),
(34, 'linkDaniela', '<a href="http://ca.linkedin.com/in/dkorinth">linkedIn</a><br /><br />', 'not defined', 0),
(35, 'metaTitleSoco', 'Solar panel installation | Get the best deal on solar panels<br />', 'not defined', 1),
(36, 'aboutBetterTime', '<h3 style="margin-bottom:15px;">This is the best time in history to go solar</h3>\r\n<h5 style="font-weight:normal;margin-bottom:20px;padding-right:5px;">The price of solar has decreased by over 50% in the last 2 years, creating an amazing opportunity to reduce your electricity bill and lock in your electricity price today to avoid future price increases. There are a number of incentives available that make installing solar still more financially attractive. Further, solar installers will install solar on your home or business for no upfront cost, allowing you to instantly start saving on your utility bill. Gridbid allows you to ensure that when you are ready to go solar, you get the best possible deal and the process is streamlined and fun. You can try Gridbid free with no obligation today.</h5>', 'not defined', 0),
(37, 'bioMarc', '<table style="font-family:Arial, Verdana;font-size:10pt;margin-bottom:50px;"><tbody><tr style="vertical-align:top;"><td style="width:500px;vertical-align:top;"><div class="biotitle">Marc Baumgartner, Designer</div>\r\n<div class="biowriteup">Marc is a veteran entrepreneur and designer,\r\nhaving co-founded Ayoudo, Codename Design and lead all design at NowPublic\r\nthrough its inception, substantial venture financing, and acquisition by\r\nExaminer.com in 2009. Marc is also an avid cyclist who puts the rest of the\r\nGridbid team to shame not only in design, but also on a road bike.\r\n</div><br />twitter: <a href="https://twitter.com/#%21/marcbx">@marcbx</a>, <a href="http://ca.linkedin.com/pub/marc-baumgartner/3/777/1b4">linkedIn</a></td>\r\n</tr></tbody></table>', 'not defined', 0),
(38, 'bioDaniela', '<table style="font-family:Arial, Verdana;font-size:10pt;margin-bottom:50px;"><tbody><tr style="vertical-align:top;"><td style="width:500px;vertical-align:top;"><div class="biotitle">Kevin Starke, Co-Founder</div>\r\n<div class="biowriteup">Kevin is a co-founder of Gridbid, Habitat Enterprises and PowerLend with over four years of experience analyzing renewable energy opportunities in both North and South America. Kevin previously worked for KPMG in Canada and Euro-Trend in Europe where he had work published on International Policy. Kevin has a Bachelor of Commerce from the University of Victoria where he received the Medal of Excellence for receiving the top academic scores of any graduant. In his youth Kevin was a sponsored skateboarder and is now an aspiring triathlete.</div><br />twitter: <a href="http://twitter.com/KevinStarke">@kevinstarke</a>, <a href="http://ca.linkedin.com/in/kevinstarke/">linkedIn</a></td>\r\n</tr></tbody></table>', 'not defined', 0),
(39, 'bioSpencer', '<table style="font-family:Arial, Verdana;font-size:10pt;margin-bottom:50px;"><tbody><tr style="vertical-align:top;"><td style="width:500px;vertical-align:top;"><div class="biotitle">Spencer, Loyalty</div>\r\n<div class="biowriteup">Spencer is a dog, and is extremely loyal. Between fetch matches, naps, and meals, Spencer finds time to keep the Gridbid team having fun and working hard to dramatically improve how building owners go solar.\r\n</div></td>\r\n</tr></tbody></table>', 'not defined', 0),
(40, 'linkSpencer', '<br />', 'not defined', 0),
(41, 'aboutLeadIn', '<h4 style="font-weight:normal;margin-top:0px;margin-bottom:25px;padding-right:5px;">Launched in 2012, Gridbid auctioned more than $300,000 in rooftop solar projects in its first week online, helping numerous building owners go solar and many solar installers secure great new customers. Gridbid is a product of Habitat Enterprises, an independent, privately held company with offices in Berkeley and Vancouver.</h4>', 'About Lead In', 0),
(42, 'creditFormTop', '<div style="margin:0 30px;"> <div style="font-size:24px;font-weight:bold;margin-bottom:10px;">Payment Details</div> <div style="margin-bottom:10px;font-size:13px;">Please enter your credit card information below.  No charges will be made to this card until you have been selected as the winning bidder of a Gridbid auction. At that point you will be charged Gridbid''s exclusive lead fee at $100 per kW (DC) of installation size.</div> </div>', 'not defined', 0),
(43, 'aboutSecurity', '<h3 style="margin-bottom:15px;">Security</h3> \r\n<h5 style="font-weight:normal;">By default your data is securely stored in the Gridbid cloud using world-class technology and techniques.</h5>', 'not defined', 0),
(44, 'aboutHomeOwners', '<div class="portletShadowBox" style="margin-bottom:40px;">\r\n<img src="images/title_homeowner.png" alt="Gridbid for Homeowners" style="font-size:20px;font-weight:bold;" /><h4 style="font-weight:normal;">Gridbid.com is for anyone who owns a building with a roof who needs to reduce their monthly utility bill by going solar.<br /><a href="#homeowners">Learn more</a></h4>\r\n</div>', 'not defined', 0),
(45, 'aboutInstallers', '<div class="portletShadowBox">\r\n<img src="images/title_installers.png" alt="Gridbid for Installers" style="font-size:20px;font-weight:bold;" /><h4 style="font-weight:normal;">With Gridbid you only pay for customers you actually get.  Gridbid.com is for any solar installer who needs to reduce the cost of vetting and securing roofs to install solar on. <a href="#installers">Learn more</a></h4>\r\n</div>', 'not defined', 0),
(46, 'bioAaron', '<table style="font-family:Arial, Verdana;font-size:10pt;margin-bottom:50px;"><tbody><tr style="vertical-align:top;"><td style="width:500px;vertical-align:top;"><div class="biotitle">Aaron Kennedy, Software Development</div>\r\n<div class="biowriteup">Aaron graduated with a Master’s in Electro-mechanical engineering from the University of British Columbia.  After a placement at the European Space Agency in Holland he attended the International Space University in 2005.  He recently completed his Project Management Professional certification.  The Gridbid initiative struck a chord with his desire to work on projects that have major environmental impact and he is excited to be involved as a developer.</div><br />twitter: <a href="https://twitter.com/#%21/dmkdesign79">@dmkdesign79</a>, <a href="http://www.linkedin.com/pub/aaron-kennedy/4/645/780">linkedIn</a><br /></td>\r\n</tr></tbody></table>', 'not defined', 0),
(47, 'metaKeywordsAbout', 'solar panel kits, solar installer, installation solar power, installation solar panels cost, solar leads, reduce utility bill<br />', 'Meta tag for about page', 1),
(48, 'metaDescriptionAbout', 'On this page we explain how Gridbid solar auctions work and why this is the best time to go solar.<br />', 'Meta Tag for About Description', 1),
(49, 'metaTitleAbout', 'The world''s first rooftop solar auction - About Gridbid', 'Title Tag contents', 1),
(50, 'bioInvestors', '<h3>Investors</h3>\r\n<h5 style="margin-bottom:50px;font-weight:normal;">Gridbid is funded by Habitat Enterprises and a number of successful Angel Investors in the renewable energy marketplace including Matthew Shaw, Ralph Turfus, and Michael Volker. </h5>', 'not defined', 0),
(51, 'refund', '<h2>Refund Policy</h2><p>Gridbid will refund 100% of its fee if notified within 60 days of an auction closing that a contract between the winning installer and the building owner has not, and will not be signed.  Gridbid requires written documentation from the installer proving that the building owner has chosen not to move forward with the installer''s contract.  This can come in the form of an email or other written document from the building owner stating their intention to not sign a contract. If documentation is not provided stating that a contract will not be signed, then Gridbid will contact the building owner directly to verify that a contract will not be signed. <br /><br />Gridbid will refund 50% its fee if notified after 2 months of an auction closing that a contract between the winning installer and the building owner has not, and will not be signed. Gridbid requires written documentation from the installer proving that the building owner has chosen not to move forward with the installer''s contract.  This can come in the form of an email or other written document from the building owner stating their intention to not sign a contract. If documentation is not provided stating that a contract will not be signed, then Gridbid will contact the building owner directly to verify that a contract will not be signed. <br /><br />All refunds from Gridbid will be processed within 5 business days of Gridbid receiving written documentation or verbal verification from a building owner that a contract will not be signed.<br /><br /></p><p></p>', 'not defined', 0),
(52, 'roofSEOtext', '<div style="font-size:14px;"> At Gridbid we believe that it is time to switch to clean and renewable energy  sources and we believe there has been no better time in history to go solar than  right now. <br /><br /><strong>Solar energy - A clean source of energy</strong> <br />Solar energy is considered a true alternative to fossil fuels (such as oil, coal and  gasoline). It is a natural, clean and renewable source of energy that is  expected to last for at least another 4 billion years (depending on how long the  sun provides us with its light). We can use solar energy to produce cleaner,  better electricity with solar cells either located on rooftops or on the  ground.<br /><br /><strong>Solar energy - An affordable alternative</strong> <br /> With the price for solar panels decreasing over 50% in the last 2 years solar power  has been expanding rapidly. This has allowed for more competition within the US  solar industry and as a result solar cells have become more efficient while  production costs have dramatically decreased. Different types of subsidies,  including federal, state and local solar incentives as well as solar rebate  programs, are also making going solar more attractive than ever before. There  are even different payment options available and there is no longer the need to  pay a large amount of cash upfront to have solar panels  installed. <br /><br /><strong>Solar energy - A great investment for future savings </strong> <br /> With solar energy you start reducing your monthly utility bill as soon as your solar  power system goes live. Depending on the form of financing you choose there  might be a monthly solar lease or PPA fee for your solar power system. The  lease/PPA fee is usually still cheaper than the amount of your old monthly  utility bill. With your own solar power system your electricity rate will be  predictable and you will be able to protect yourself from rising energy cost for  the next 20 plus years. <br /><br /> Gridbid helps you find the best deal on rooftop solar by having solar installers submit  competing offers for your solar installation.<br /><a href="http://www.gridbid.com/index.php?r=leadsWizard/WizardStart&amp;step=gettingStarted">Start saving money each month by going solar now.</a> </div>', 'not defined', 0),
(53, 'socoH1', '<div style="font-size:62px;font-weight:bold;line-height:55px;">Save 80% Securing Roof Leads</div>', 'not defined', 0),
(54, 'socoH2', '<div style="margin:19px 0;font-size:14px;line-height:20px;">Pay business development costs only for roofs you actually secure. Simply find roofs up for auction on Gridbid, review the detailed roof information and place a bid that highlights your unique characteristics. If your bid wins the auction, the lead is exclusively yours. </div>', 'not defined', 0),
(55, 'socoLandingPic', '<div class="slide" style="background-color:#FFFFFF;">\n                      <img style="margin:auto;" alt="Slide 1" src="images/solar1.jpg" width="500" /><div class="caption">Only pay for leads you get</div>\n</div>\n<div class="slide" style="background-color:#FFFFFF;">\n      <img style="margin:auto;" alt="Slide 5" src="images/solar2.jpg" width="500" /><div class="caption">Find any size of project</div>\n</div>\n<div class="slide" style="background-color:#FFFFFF;">\n   <img style="margin:auto;" alt="Slide 3" src="images/solar3.jpg" width="500" /><div class="caption">Differentiate yourself from your competition</div>\n</div>\n<div class="slide" style="background-color:#FFFFFF;">\n     <img style="margin:auto;" alt="Slide 2" src="images/solar4.jpg" width="500" /><div class="caption">Save money securing leads</div>\n</div>', 'not defined', 2),
(56, 'automailHeader', '<h3 style="color:#02A1DE;margin-top:10px;">Sign up for auction alerts</h3>\n<p>Gridbid will send you an email to alert you of any new auctions posted.</p>', 'not defined', 0),
(57, 'bidRules', '<div style="font-size:18px;font-weight:bold;margin-bottom:15px;">Auction Rules</div>\n<div style="font-size:14px;">\nEach installer can submit only one bid per auction and a maximum of 4 \nbids are allowed per auction. Once the proposal deadline is reached, the\nbuilding owner will review the bids and select the winning bidder. That\nbidder will be given the detailed contact information of the building \nowner, who is awaiting their call. If your bid wins, the building owner \nhas agreed to exclusively negotiate your solar contract, but are not \nobligated to sign your contract.</div>', 'not defined', 0),
(58, 'bidWizardTitle', '<div style="font-size:24px;">Bid on this project!</div>', 'not defined', 0),
(59, 'bidForm_FeeText', '<div style="margin-bottom:15px;">I agree that if I am selected as the winning bidder for this auction, I will pay Gridbid $100 per kW DC of installation size included in my winning bid. </div> ', 'not defined', 0),
(60, 'bidFAQ1_Question', 'How Bidding Works. ', 'not defined', 0),
(61, 'bidFAQ1_Answer', '<div style="font-size:14px;">Submit your bid by signing in and filling in your bid information in 4 easy steps.<br /><br />Each installer can submit only one bid per auction and a maximum of 4 bids are allowed per auction, so submit yours fast! <br /><br />Once the proposal deadline is reached, the building owner will review the bids and select the winning bidder. That bidder will be given the detailed contact information of the building owner, who is awaiting their call.<br /><br />If your bid wins, the building owner has agreed to exclusively negotiate your solar contract, but are not obligated to sign your contract.</div>', 'not defined', 0),
(62, 'bidFAQ2_Question', 'Lowest Bid Does Not Always Win ', 'not defined', 0),
(63, 'bidFAQ2_Answer', '<div style="font-size:14px;">The lowest price bid does not always win. Price, warranty, utility bill savings, equipment quality, energy production, installer track record and key differentiators are all presented to building owners for them to make their decision. This gives installers the ability to separate themselves from their competition. Each bid is also given a Gridbid Score to help building owners identify the best bid for them.</div>', 'not defined', 0),
(64, 'bidFAQ3_Question', 'Gridbid Score', 'not defined', 0),
(65, 'bidFAQ3_Answer', '<div style="font-size:14px;">Each bid is given a Gridbid Score. This Gridbid Score is meant to help building owners identify the best bid for them.  The Gridbid Score is based on a number of factors including: price, system and power warranty, equipment quality, energy bill savings, energy production and installer track record.  Aim to be competitive on all of these factors to maximize your Gridbid Score.</div> ', 'not defined', 0),
(66, 'bidFAQ4_Question', 'Bid Requirements ', 'not defined', 0),
(67, 'bidFAQ4_Answer', '<div style="font-size:14px;">All bids presented on Gridbid include the following information: financial details for the primary financing option, financial details for additional financing options available from the installer, key differentiators that separate the installer from its competition, system specs, system and power warranty, number of installations completed by the installer to date, and the environmental benefits created by the installation.</div>', 'not defined', 0),
(68, 'bidFAQ5_Question', 'Gridbid Fee', 'not defined', 0),
(69, 'bidFAQ5_Answer', '<div style="font-size:14px;">The winning bidder of each auction is charged a Gridbid Fee.  The Gridbid Fee is $100 per kW DC of installation size for the system included in the winning bid. This fee is payable within 10 days of winning the auction and is refundable if the auction does not turn into a contract.</div>', 'not defined', 0),
(70, 'aboutAddress', '<h3>Contact Info</h3>\r\n\r\n<div class="biowriteup">\r\nGridbid<br />\r\n1 Little West 12th Street<br />\r\nNew York City, NY<br />\r\nUnited States 10014<br /><br />\r\n\r\nPhone: 1-855-474-3243<br />\r\nEmail: support@gridbid.com</div>\r\n<br />', 'not defined', 0),
(71, 'landingNews', '<div class="clear-fix" style="color:#00A0DE;font-size:22px;font-weight:bold;margin-bottom:15px;">Gridbid has been featured in the following publications</div>\r\n<table><tbody><tr style="height:75px;"><td style="width:225px;border-right:1px solid #D9D9D9;"><div style="margin:auto;width:169px;"><a href="http://www.fastcoexist.com/1679974/how-valuable-is-your-roof-put-it-up-for-solar-auction"><img src="images/fastcompany_logo1.png" alt="fastcompany" /></a></div></td>\r\n<td style="width:225px;border-right:1px solid #D9D9D9;"><div style="margin:auto;width:95px;"><a href="http://www.good.is/post/gridbid-auction-off-your-sunny-unused-roof-space"><img src="images/good_logo2.png" alt="good" /></a></div></td>\r\n<td style="width:225px;border-right:1px solid #D9D9D9;"><div style="margin:auto;width:90px;"><a href="http://grist.org/climate-energy/auction-yer-roof-and-other-ways-of-streamlining-distributed-energy"><img src="images/grist_logo2.png" alt="grist" /></a></div></td>\r\n<td style="width:225px;"><div style="margin:auto;width:126px;"><a href="http://www.mnn.com/your-home/at-home/blogs/gridbid-a-rooftop-auction-site-for-solar-seeking-homeowners"><img src="images/mnn_logo2.png" alt="mother nature network" /></a></div></td>\r\n</tr></tbody></table>', 'not defined', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE IF NOT EXISTS `tbl_branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `company_id` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `menuText` varchar(100) DEFAULT NULL,
  `menuVisible` int(1) NOT NULL DEFAULT '0',
  `isVisible` int(11) NOT NULL DEFAULT '0',
  `hasChildren` int(1) NOT NULL COMMENT '0 No 1 Yes',
  `childName` varchar(150) NOT NULL DEFAULT '',
  `sortOrder` int(3) NOT NULL,
  `menuLink` varchar(250) NOT NULL,
  `metakeywords` varchar(250) NOT NULL DEFAULT '',
  `metadescription` varchar(500) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `description`, `menuText`, `menuVisible`, `isVisible`, `hasChildren`, `childName`, `sortOrder`, `menuLink`, `metakeywords`, `metadescription`) VALUES
(7, 'About', 'This is the Incitrack about page.&nbsp; To be filled in!<br>', 'About Incitrack', 1, 1, 0, '', 1, 'category/view&id=7', 'BCARC Accident Tracking Report Page', 'BCARC - British Columbia Association of Restoration Contractors - Accidetn tracking web application<br>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chart`
--

CREATE TABLE IF NOT EXISTS `tbl_chart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `q_id` int(5) NOT NULL,
  `menuLabel` varchar(255) NOT NULL,
  `chartTitle` varchar(1000) NOT NULL,
  `isPie` int(1) NOT NULL DEFAULT '1',
  `isBar` int(1) NOT NULL DEFAULT '1',
  `customView` varchar(255) NOT NULL,
  `chartType` int(3) NOT NULL,
  `section` int(3) NOT NULL,
  `sequence` int(3) NOT NULL DEFAULT '99',
  `publish` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `tbl_chart`
--

INSERT INTO `tbl_chart` (`id`, `q_id`, `menuLabel`, `chartTitle`, `isPie`, `isBar`, `customView`, `chartType`, `section`, `sequence`, `publish`) VALUES
(1, 46, 'Classification of Incident', 'How was this incident classified?', 1, 1, '', 3, 1, 0, 1),
(2, 54, 'Work Procedure Available', 'Was a work procedure available?', 1, 1, '', 3, 6, 0, 1),
(3, 47, 'What was the employee performing during incident', 'What was the employee performing during incident', 1, 1, '', 3, 1, 1, 1),
(6, 76, 'Source of Injury', 'Source of Injury', 1, 1, '', 3, 1, 1, 1),
(7, 23, 'Day of the Week', 'What day of the week did the incident occur on?', 1, 1, 'dayOfWeek', 3, 0, 1, 1),
(8, 23, 'Time of Day', 'What time of day did the incident occur?', 1, 1, 'timeOfDay', 3, 0, 0, 1),
(9, 54, 'Incidents with overtime prior to shift ', 'Incidents with overtime prior to shift ', 0, 1, '', 3, 6, 0, 1),
(11, 50, 'Accidents by Head Injury', 'Accidents by Head Injury', 1, 0, '', 3, 2, 1, 1),
(12, 51, 'Accidents by Upper Body Injury', 'Accidents by Upper Body Injury', 1, 0, '', 3, 2, 2, 1),
(13, 52, 'Accidents by Lower Body Injury', 'Accidents by Lower Body Injury', 1, 0, '', 3, 2, 3, 1),
(14, 50, 'Accidents by Area Injured', 'Accidents by Area Injured', 1, 0, 'areaInjured', 3, 2, 0, 1),
(17, 77, 'Accidents by Type of Hazard', 'Accidents by Type of Hazard', 1, 1, 'typeHazard', 3, 3, 0, 1),
(18, 77, 'Accidents by Type of Hazard (Slip/Trip/Fall)', 'Accidents by Type of Hazard (Slip/Trip/Fall)', 1, 0, 'typestf', 3, 3, 1, 1),
(19, 77, 'Accidents by Type of Hazard (Mechanical Hazard)', 'Accidents by Type of Hazard (Mechanical Hazard)', 1, 0, 'typemh', 3, 3, 2, 1),
(20, 77, 'Accidents by Type of Hazard (Physical Hazard)', 'Accidents by Type of Hazard (Physical Hazard)', 1, 0, 'typeph', 3, 3, 3, 1),
(21, 77, 'Accidents by Type of Hazard (Environmental Hazardl)', 'Accidents by Type of Hazard (Environmental Hazard)', 1, 1, 'typeeh', 3, 3, 4, 1),
(22, 77, 'Accidents by Type of Hazard (Chemical Hazard)', 'Accidents by Type of Hazard (Chemical Hazard)', 1, 1, 'typech', 3, 3, 5, 1),
(23, 77, 'Accidents by Type of Hazard (Biological Hazard)', 'Accidents by Type of Hazard (Biological Hazard)', 1, 1, 'typebh', 3, 3, 6, 1),
(24, 77, 'Accidents by Type of Hazard (Confined Space)', 'Accidents by Type of Hazard (Confined Space)', 1, 1, 'typecs', 3, 3, 7, 1),
(25, 23, 'Monthly Trends', 'Monthly Trends', 1, 0, 'monthlyTrend', 3, 0, 2, 1),
(26, 48, 'Type of Injury', 'Type of Injury', 1, 1, '', 3, 1, 3, 1),
(27, 82, 'Probable Cause', 'Probable Cause of Incident', 1, 1, '', 3, 4, 0, 1),
(28, 81, 'Probability of Reoccurence', 'Probability of Reoccurence', 1, 1, '', 3, 1, 5, 1),
(29, 28, 'Gender', 'Gender', 1, 1, '', 3, 5, 2, 1),
(30, 34, 'Department', 'Department of Employee', 1, 1, '', 3, 5, 2, 0),
(31, 84, 'Remedial Action', 'What remedial actions will be implemented.', 1, 1, '', 3, 4, 3, 1),
(32, 80, 'Site Safety Action Assessment', ' Site Safety Action Assessment Status', 1, 1, '', 3, 1, 4, 1),
(33, 64, 'Site Safety Assessment', 'Was a site safety assessment completed?', 1, 1, '', 3, 6, 0, 1),
(34, 65, 'Site Safety Assessment Review', 'Was the site safety assessment reviewed by the worker?', 1, 1, '', 3, 6, 1, 1),
(35, 66, 'Source Identified', 'Was the source identified on the site safety assessment?', 1, 1, '', 3, 6, 2, 1),
(36, 67, 'Safety Assessment Adequate', 'Was the site safety assessment adequate?', 1, 1, '', 3, 6, 3, 1),
(37, 68, 'Safety Toolbox Meeting', 'Was a safety toolbox meeting completed?', 1, 1, '', 3, 6, 4, 1),
(38, 69, 'Toolbox Attendance', 'Did the worker attend the toolbox meeting? ', 1, 1, '', 3, 0, 5, 1),
(39, 70, 'Source in the Toolbox Meeting?', 'Was the source identified in the toolbox meting?', 1, 1, '', 3, 6, 6, 1),
(40, 71, 'Toolbox Meeting Adequate', 'Was the toolbox meeting adequate?', 1, 1, '', 3, 6, 7, 1),
(41, 72, 'Safe Work Practice Available', 'Was a safe work practice available?', 1, 1, '', 3, 6, 8, 1),
(42, 73, 'Safe Work Practice Reviewed', 'Was the safe work practice reviewed by the worker?', 1, 1, '', 3, 6, 9, 1),
(43, 74, 'Safe Work Procedure Available', 'Was a safe work procedure available?', 1, 1, '', 3, 6, 10, 1),
(44, 75, 'Safe Work Procedure Reviewed', 'Was the safe work procedure reviewed by the worker', 1, 1, '', 3, 6, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_choices`
--

CREATE TABLE IF NOT EXISTS `tbl_choices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(200) NOT NULL,
  `position` int(11) NOT NULL,
  `graphic` varchar(200) NOT NULL,
  `question` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=194 ;

--
-- Dumping data for table `tbl_choices`
--

INSERT INTO `tbl_choices` (`id`, `text`, `position`, `graphic`, `question`) VALUES
(1, 'Head', 1, '', 26),
(2, 'Arm', 2, '', 26),
(3, 'Icy Surface', 1, '', 27),
(4, 'Confined Space', 2, '', 27),
(5, 'Alchohol involved', 3, '', 27),
(6, 'Not paying attention', 3, '', 27),
(7, 'Tom Foolery', 5, '', 27),
(8, 'Male', 0, '', 28),
(9, 'Female', 1, '', 28),
(10, 'Near Miss', 1, '', 46),
(11, 'First Aid', 2, '', 46),
(12, 'Medical Aid', 3, '', 46),
(13, 'Fatality', 4, '', 46),
(14, 'Time Loss', 5, '', 46),
(15, 'Injury, no time lost', 6, '', 46),
(16, 'Modified Duty', 7, '', 46),
(17, 'Off work', 8, '', 46),
(18, 'Ache/Pain/Soreness', 0, '', 48),
(19, 'Exposure to Substance', 1, '', 48),
(20, 'Allergic Reaction', 2, '', 48),
(21, 'Amputation', 3, '', 48),
(22, 'Bite/Sting', 4, '', 48),
(23, 'Bruise/Contusion', 5, '', 48),
(24, 'Burn', 6, '', 48),
(25, 'Cold Stress', 7, '', 48),
(26, 'Contagious/Infectious disease', 8, '', 48),
(27, 'Chronic Pain', 9, '', 48),
(28, 'Concussion', 10, '', 48),
(29, 'Crushing Injury', 11, '', 48),
(30, 'Dislocation/Separation', 12, '', 48),
(31, 'Electrical Injury', 13, '', 48),
(32, 'Fatality', 14, '', 48),
(33, 'Fracture', 15, '', 48),
(34, 'Cardiac/Heart Attack', 16, '', 48),
(35, 'Heat Stress', 17, '', 48),
(36, 'Imbedded Object', 18, '', 48),
(37, 'Irritation', 19, '', 48),
(38, 'Laceration', 20, '', 48),
(39, 'No Injury/No Ilness', 21, '', 48),
(40, 'Puncture Wound', 22, '', 48),
(41, 'Sprain/Strain', 23, '', 48),
(42, 'Stress', 24, '', 48),
(43, 'Stroke', 25, '', 48),
(44, 'Regular Duty', 0, '', 47),
(45, 'Newly Assigned Duty', 1, '', 47),
(46, 'Modified Duty', 2, '', 47),
(47, 'Assigned Break', 3, '', 47),
(48, 'Change of Work Location', 4, '', 47),
(49, 'Product Testing', 5, '', 47),
(50, 'Professional Development', 6, '', 47),
(51, 'Brain', 1, '', 50),
(52, 'Dental', 2, '', 50),
(53, 'Ear', 3, '', 50),
(54, 'Eye', 4, '', 50),
(55, 'Face', 5, '', 50),
(56, 'Mouth', 6, '', 50),
(57, 'Neck', 7, '', 50),
(58, 'Nose', 8, '', 50),
(59, 'Throat', 9, '', 50),
(60, 'Skull', 10, '', 50),
(61, 'Abdomen', 1, '', 51),
(62, 'Chest', 2, '', 51),
(63, 'Collar Bone', 3, '', 51),
(64, 'Elbow', 4, '', 51),
(65, 'Finger(2)', 5, '', 51),
(66, 'Forearm', 6, '', 51),
(67, 'Hand', 7, '', 51),
(68, 'Heart', 8, '', 51),
(69, 'Internal Organs', 9, '', 51),
(70, 'Lungs', 10, '', 51),
(71, 'Ribs', 11, '', 51),
(72, 'Shoulder', 12, '', 51),
(73, 'Skin', 13, '', 51),
(74, 'Spleen', 14, '', 51),
(75, 'Thumb', 15, '', 51),
(76, 'Upper Arm', 16, '', 51),
(77, 'Wrist', 17, '', 51),
(78, 'Ankle', 1, '', 52),
(79, 'Back', 2, '', 52),
(80, 'Buttocks', 3, '', 52),
(81, 'Foot', 4, '', 52),
(82, 'Genitals', 5, '', 52),
(83, 'Groin', 6, '', 52),
(84, 'Hip', 7, '', 52),
(85, 'Knee', 8, '', 52),
(86, 'Leg Lower', 9, '', 52),
(87, 'Leg Upper', 10, '', 52),
(88, 'Pelvis', 11, '', 52),
(89, 'Toe(s)', 12, '', 52),
(90, 'Hand Tool', 1, '', 76),
(91, 'Power Tool', 2, '', 76),
(92, 'Equipment', 3, '', 76),
(93, 'Vehicle', 4, '', 76),
(94, 'Structure', 5, '', 76),
(95, 'Materials', 7, '', 76),
(96, 'Content', 8, '', 76),
(97, 'Person', 9, '', 76),
(98, 'Substance', 10, '', 76),
(99, 'Ladder', 11, '', 76),
(100, 'Surface', 6, '', 76),
(101, 'Environment', 12, '', 76),
(102, 'Alcohol Impairment', 1, '', 82),
(103, 'Disregard of Procedures', 2, '', 82),
(104, 'Disregard for Safety', 3, '', 82),
(105, 'Drug Impairment', 4, '', 82),
(106, 'Equipment', 5, '', 82),
(107, 'Improper Tools', 6, '', 82),
(108, 'Lack of Communication', 7, '', 82),
(109, 'Lack of Supervision', 8, '', 82),
(110, 'Lack of Training', 9, '', 82),
(111, 'Maintenance', 10, '', 82),
(112, 'Material', 11, '', 82),
(113, 'No SSA', 12, '', 82),
(114, 'No use of PPE', 13, '', 82),
(115, 'Poor Job Planning', 14, '', 82),
(116, 'Texting', 15, '', 82),
(117, 'Unsafe Act', 16, '', 82),
(118, 'Unsafe Conditions', 17, '', 82),
(119, 'Discipline supervisor/manager', 1, '', 84),
(120, 'Re-design of work area', 2, '', 84),
(121, 'Improve housekeeping', 3, '', 84),
(122, 'Improve work procedures', 4, '', 84),
(123, 'Review/Improve inspection procedures', 5, '', 84),
(124, 'Repair or replace tools or equipment', 6, '', 84),
(125, 'Perform Job Hazard Analysis', 7, '', 84),
(126, 'Recommendation to improve training (describe in ''other'' box below)', 8, '', 84),
(127, 'Discipline employee', 9, '', 84),
(128, 'Review Safe Practice', 10, '', 84),
(129, 'Re-train employee', 11, '', 84),
(130, 'Re-train supervisor/manager', 12, '', 84),
(131, 'Review incident details at management meeting', 13, '', 84),
(132, 'Communicate action items to associates', 14, '', 84),
(133, 'Acquire new tools or equipment', 15, '', 84),
(134, 'Increase supervision', 16, '', 84),
(135, 'Install safety device', 17, '', 84),
(136, 'Holes in Floor', 1, 'stf', 77),
(137, 'Railing Missing', 2, 'stf', 77),
(138, 'Work Above 10''', 3, 'stf', 77),
(139, 'Scaffolding', 4, 'stf', 77),
(140, 'Ice/Snow', 5, 'stf', 77),
(141, 'Ladders', 6, 'stf', 77),
(142, 'Site Cluttered', 7, 'stf', 77),
(143, 'Wrinkled/Loose Step Covering', 8, 'stf', 77),
(144, 'Poor Lighting', 9, 'stf', 77),
(145, 'Slippery Surfaces', 10, 'stf', 77),
(146, 'Animal Related', 1, 'ph', 77),
(147, 'Falling Object', 2, 'ph', 77),
(148, 'Heavy Lifting', 3, 'ph', 77),
(149, 'Traffic', 4, 'ph', 77),
(150, 'Awkward Lifting', 5, 'ph', 77),
(151, 'Floor Unsafe', 6, 'ph', 77),
(152, 'Power Tools', 7, 'ph', 77),
(153, 'Ventilation', 8, 'ph', 77),
(154, 'Ceiling Unsafe', 9, 'ph', 77),
(155, 'Flying Debris', 10, 'ph', 77),
(156, 'Sharp Objects', 11, 'ph', 77),
(157, 'Extreme Heat/Cold', 12, 'ph', 77),
(158, 'Forceful Pushing/Pulling', 13, 'ph', 77),
(159, 'Structure Unsafe', 14, 'ph', 77),
(160, 'Crushing/Cutting', 1, 'mh', 77),
(161, 'Mobile Equipment', 2, 'mh', 77),
(162, 'Underground/Excavation/Wells', 3, 'mh', 77),
(163, 'Crushing/Falling', 4, 'mh', 77),
(164, 'Overhead', 5, 'mh', 77),
(165, 'Exposed Moving Parts', 6, 'mh', 77),
(166, 'Pilot Lights', 7, 'mh', 77),
(167, 'Pressure Lines', 8, 'mh', 77),
(168, 'Falling Objects', 9, 'mh', 77),
(169, 'Exposed Electrical Panel', 1, 'eh', 77),
(170, 'Underground Wires/Conduits', 2, 'eh', 77),
(171, 'Exposed Bare Wires', 3, 'eh', 77),
(172, 'Water/Wet Areas', 4, 'eh', 77),
(173, 'Overhead Wires', 5, 'eh', 77),
(174, 'Flammable', 1, 'ch', 77),
(175, 'Propane', 2, 'ch', 77),
(176, 'Hazardous Chemical', 3, 'ch', 77),
(177, 'Smoke/Fumes', 4, 'ch', 77),
(178, 'Hazardous Gases', 5, 'ch', 77),
(179, 'Unidentified Chemicals', 6, 'ch', 77),
(180, 'Natural Gas/Oil', 7, 'ch', 77),
(181, 'Asbestos', 1, 'bh', 77),
(182, 'Bodily Fluids', 2, 'bh', 77),
(183, 'Animal Droppings', 3, 'bh', 77),
(184, 'Bacteria/Virus', 4, 'bh', 77),
(185, 'Lead', 5, 'bh', 77),
(186, 'Sewage', 6, 'bh', 77),
(187, 'Blood Pathogens', 7, 'bh', 77),
(188, 'Mould', 8, 'bh', 77),
(189, 'Silica', 9, 'bh', 77),
(190, 'Restricted Entry or Exit', 1, 'cs', 77),
(191, 'Enclosed or Partially', 2, 'cs', 77),
(192, 'Space Large Enough', 3, 'cs', 77),
(193, 'Continuous Human Occupancy', 4, 'cs', 77);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE IF NOT EXISTS `tbl_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL COMMENT 'company name',
  `contact_name` varchar(255) NOT NULL COMMENT 'contact anem',
  `contact_email` varchar(255) NOT NULL COMMENT 'conact email',
  `contact_phone` varchar(255) NOT NULL COMMENT 'contact phone',
  `logo_file` varchar(255) NOT NULL COMMENT 'file name of logo',
  `css_file` text NOT NULL COMMENT 'file will be used instead of main.css',
  `branches` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`id`, `company_name`, `contact_name`, `contact_email`, `contact_phone`, `logo_file`, `css_file`, `branches`) VALUES
(1, 'DMK Design', 'Aaron Kennedy', 'aaron@dmkdesign.ca', '7782418544', 'na', 'na', ''),
(2, 'company', 'Aaron_super', 'akennedy69@msn.com', '7782418544', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE IF NOT EXISTS `tbl_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(256) NOT NULL COMMENT 'filename of graphic',
  `category` int(11) NOT NULL DEFAULT '-1' COMMENT '0-site, 1-collection,',
  `associate_id` int(11) NOT NULL DEFAULT '-1' COMMENT 'id of record in specified category',
  `alt_text` varchar(256) NOT NULL DEFAULT '' COMMENT 'the text to go in the alt attribute of image',
  `caption` varchar(512) NOT NULL DEFAULT '' COMMENT 'A caption if desired.  Can be used for photoslider etc.',
  `isMain` int(3) NOT NULL DEFAULT '0' COMMENT '0-false, 1-true',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Uploaded images can be associated with articles and/or whatever else.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mainconfig`
--

CREATE TABLE IF NOT EXISTS `tbl_mainconfig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `merchant_mode` varchar(30) NOT NULL COMMENT 'live/sandbox mode.  This will contain the name of the current config',
  `pricing` varchar(30) NOT NULL COMMENT 'contains the name of the current pricing plan.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_mainconfig`
--

INSERT INTO `tbl_mainconfig` (`id`, `merchant_mode`, `pricing`) VALUES
(1, 'evo_live', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE IF NOT EXISTS `tbl_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `sequence` int(11) NOT NULL,
  `css` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`id`, `title`, `description`, `sequence`, `css`) VALUES
(1, 'Employee Information', 'Please fill out the employee information', 1, ''),
(2, 'Incident Information', 'Please use the following section to describe the Incident', 3, ''),
(3, 'Incident Report Information', 'Describe the investigation information', 2, ''),
(4, 'Safety Information', '', 4, ''),
(5, 'Incident Description: Who-What-When-How-Why', '', 5, ''),
(6, 'Probable Cause', '', 6, ''),
(7, 'Remedial Actions', '', 7, ''),
(8, 'Witnesses', '', 8, ''),
(9, 'Result/Conclusion', '', 9, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profiles`
--

CREATE TABLE IF NOT EXISTS `tbl_profiles` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `address1` varchar(100) NOT NULL DEFAULT '',
  `address2` varchar(100) NOT NULL DEFAULT '',
  `city` varchar(50) NOT NULL DEFAULT '',
  `zipcode` varchar(50) NOT NULL DEFAULT '',
  `state` varchar(20) NOT NULL DEFAULT '',
  `country` varchar(30) NOT NULL DEFAULT '',
  `postal` varchar(10) NOT NULL DEFAULT '',
  `businessPhone` varchar(30) NOT NULL DEFAULT '',
  `cellPhone` varchar(30) NOT NULL DEFAULT '',
  `userType` varchar(10) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `payment_token` varchar(255) NOT NULL DEFAULT '',
  `company` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_profiles`
--

INSERT INTO `tbl_profiles` (`user_id`, `lastname`, `firstname`, `address1`, `address2`, `city`, `zipcode`, `state`, `country`, `postal`, `businessPhone`, `cellPhone`, `userType`, `birthday`, `payment_token`, `company`) VALUES
(1, 'Kennedy', 'Aaron', '', '', '', '', '', '', '', '7782418544', '', '3', '0000-00-00', '566666666685', 'DMK Design'),
(733, 'Kennedy', 'aaron', '', '', '', '', '', '', '', '77821418544', '', '2', '0000-00-00', '', 'DMK Design'),
(734, 'one', 'minion', '', '', '', '', '', '', '', '7782418544', '', '0', '0000-00-00', '', 'company');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profiles_fields`
--

CREATE TABLE IF NOT EXISTS `tbl_profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_profiles_fields`
--

INSERT INTO `tbl_profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(2, 'firstname', 'First Name', 'VARCHAR', 50, 3, 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3),
(4, 'address1', 'Address Line 1', 'VARCHAR', 50, 0, 2, '', '', 'Please enter your address.', '', '', '', '', 3, 3),
(5, 'address2', 'Address Line 2', 'VARCHAR', 50, 0, 2, '', '', '', '', '', '', '', 4, 3),
(6, 'state', 'State/Province', 'VARCHAR', 50, 0, 2, '', '', '', '', '', '', '', 6, 3),
(7, 'country', 'Country', 'VARCHAR', 50, 0, 2, '', '', '', '', '', '', '', 7, 3),
(8, 'businessPhone', 'Business Phone', 'VARCHAR', 30, 0, 1, '', '', '', '', '', '', '', 8, 3),
(9, 'cellPhone', 'Cell Phone', 'VARCHAR', 30, 0, 2, '', '', '', '', '', '', '', 9, 3),
(10, 'userType', 'User Type', 'VARCHAR', 10, 0, 3, '', '0==NORMAL;1==BCARC;2==SUPERVISOR;3==ADMIN', '', '', 'NOTSET', '', '', 11, 1),
(11, 'postal', 'Postal or Zip', 'VARCHAR', 10, 0, 2, '', '', 'Please enter your postal code.', '', '', '', '', 10, 3),
(13, 'birthday', 'Birthday', 'DATE', 0, 0, 0, '', '', '', '', '0000-00-00', 'UWjuidate', '{"ui-theme":"redmond"}', 13, 0),
(14, 'payment_token', 'Payment Token', 'VARCHAR', 255, 0, 0, '', '', '', '', '', '', '', 0, 0),
(16, 'company', 'Company', 'VARCHAR', 255, 0, 0, '', '', '', '', '', '', '', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE IF NOT EXISTS `tbl_question` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  `helpText` varchar(1000) DEFAULT NULL,
  `css` varchar(256) DEFAULT NULL COMMENT 'CSS used to style choices',
  `page_id` int(11) NOT NULL,
  `choicesView` varchar(256) NOT NULL DEFAULT '' COMMENT 'The view name for displaying the choices',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=106 ;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`, `helpText`, `css`, `page_id`, `choicesView`) VALUES
(1, 'firstName', 'Employee First Name', 'VARCHAR', 255, 0, 1, '', '', '', '', '', '', '', 0, 1, NULL, NULL, 1, ''),
(22, 'lastName', 'Employee Last Name', 'VARCHAR', 255, 0, 3, '', '', '', '', '', '', '', 1, 3, '', '', 1, ''),
(23, 'dateIncident', 'Incident Date', 'DATE', 0, 0, 3, '', '', 'Please enter the date that the incident occured on', '', '', '', '', 1, 3, '', '', 2, '_datetime'),
(24, 'incidentaddress', 'Address of Incident', 'VARCHAR', 500, 0, 2, '', '', '', '', '', '', '', 0, 3, '', '', 2, ''),
(25, 'incidentDetails', 'Describe the injury to the body part in detail.', 'TEXT', 10000, 0, 3, '', '', '', '', '', '', '', 8, 3, '', '', 2, ''),
(28, 'gender', 'Gender', 'RADIO', 255, 0, 3, '', '', 'Required', '', '', '', '', 2, 3, '', 'horRadioGroup', 1, ''),
(29, 'dateOfBirth', 'Date Of Birth', 'DATE', 0, 0, 1, '', '', '', '', '', '', '', 3, 2, '', '', 1, '_datetime'),
(30, 'age', 'Age', 'INTEGER', 2, 0, 0, '', '', '', '', '', '', '', 4, 2, '', '', 1, 'dateofbirth'),
(31, 'employeeNumber', 'Employee Number', 'VARCHAR', 10, 0, 2, '', '', '', '', '', '', '', 3, 1, '', '', 1, ''),
(32, 'mailingAddress', 'Mailing Address', 'VARCHAR', 256, 0, 1, '', '', '', '', '', '', '', 6, 1, '', '', 1, 'mailfields'),
(33, 'localAddress', 'Local Address', 'VARCHAR', 256, 0, 2, '', '', '', '', '', '', '', 7, 1, '', '', 1, ''),
(34, 'department', 'Department', 'VARCHAR', 128, 0, 2, '', '', '', '', '', '', '', 8, 2, '', '', 1, ''),
(35, 'yearscompany', 'Years with the Company', 'FLOAT', 3, 0, 0, '', '', '', '', '', '', '', 9, 2, '', '', 1, ''),
(36, 'yearsDepartment', 'Years in current department', 'FLOAT', 3, 0, 1, '', '', '', '', '', '', '', 11, 3, '', '', 1, ''),
(37, 'investigator', 'Investigator(s)', 'VARCHAR', 256, 0, 1, '', '', '', '', '', '', '', 0, 1, '', '', 3, ''),
(38, 'dateInvestigated', 'Date and Time of Investigation', 'DATETIME', 0, 0, 1, '', '', '', '', '', '', '', 1, 2, '', '', 3, '_datetime'),
(40, 'dateReported', 'Date and Time Reported', 'DATETIME', 0, 0, 1, '', '', '', '', '', '', '{"0":"defaultDate","1":"model","2":"question","3":"form","ui-theme":"base","language":"en","createDate":"true","createTime":"true"}', 4, 3, '', '', 3, '_datetime'),
(42, 'reportedTo', 'Reported to (Employee Name/Title)', 'VARCHAR', 256, 0, 0, '', '', '', '', '', '', '', 6, 2, '', '', 3, ''),
(43, 'employeeSupervisor', 'Employee''s Supervisor', 'VARCHAR', 256, 0, 1, '', '', '', '', '', '', '', 0, 2, '', '', 3, ''),
(44, 'shiftStartTime', 'Shift Start Time', 'TIME', 0, 0, 1, '', '', '', '', '', '', '', 3, 2, '', '', 2, '_datetime'),
(45, 'jobNumber', 'Job Number', 'INTEGER', 10, 0, 2, '', '', '', '', '', '', '', 5, 2, '', '', 2, ''),
(46, 'incidentClassification', 'Classification of Incident', 'SELECT', 255, 0, 1, '', '', '', '', '', '', '', 6, 2, '', 'horRadioGroup', 2, ''),
(47, 'whilePerforming', 'Incident While Performing', 'RADIO', 255, 0, 1, '', '', '', '', '', '', '', 7, 2, '', 'horRadioGroup', 2, ''),
(48, 'injuryType', 'Type of Injury', 'SELECT', 255, 0, 1, '', '', '', '', '', '', '', 12, 3, '', 'horRadioGroup', 2, ''),
(49, 'injuryDescription', 'Injury Description', 'TEXT', 10000, 0, 1, '', '', '', '', '', '', '', 11, 2, '', '', 2, ''),
(50, 'bodyPartHead', 'Head', 'SELECT', 255, 0, 0, '', '', '', '', '', '', '', 9, 3, '', 'horRadioGroup', 2, ''),
(51, 'bodyPartUpperBody', 'Upper Body', 'SELECT', 255, 0, 0, '', '', '', '', '', '', '', 9, 3, '', 'horRadioGroup', 2, ''),
(52, 'bodyPartLowerBody', 'Lower Body', 'SELECT', 255, 0, 0, '', '', '', '', '', '', '', 10, 3, '', 'horRadioGroup', 2, ''),
(53, 'wasWorking', 'Was the employee working alone at the time of the incident?', 'VARCHAR', 5, 0, 0, '', '==;y==Yes;n==No', '', '', '', '', '', 12, 3, '', 'YNdropdown', 2, ''),
(54, 'workedOvertime', 'Had the employee worked overtime between 9pm and their next shift?', 'VARCHAR', 5, 0, 0, '', '==;y==Yes;n==No', '', '', '', '', '', 13, 3, '', 'YNdropdown', 2, ''),
(55, 'CATevent', 'Did it occur during a CAT Event?', 'VARCHAR', 5, 0, 0, '', '==;y==Yes;n==No', '', '', '', '', '', 14, 3, '', 'YNdropdown', 2, ''),
(56, 'sentHome', 'Was the worker sent home?', 'VARCHAR', 5, 0, 0, '', '==;y==Yes;n==No', '', '', '', '', '', 15, 3, '', 'YNdropdown', 2, ''),
(57, 'reportNextDay', 'Did the employee report to work the next day?', 'VARCHAR', 5, 0, 0, '', '==;y==Yes;n==No', '', '', '', '', '', 16, 3, '', 'YNdropdown', 2, ''),
(58, 'lostTime', 'Did the employee lose time from work?', 'VARCHAR', 5, 0, 0, '', '==;y==Yes;n==No', '', '', '', '', '', 17, 3, '', 'YNdropdown', 2, ''),
(59, 'returnSameDay', 'Did the employee return to work the same day?', 'VARCHAR', 5, 0, 0, '', '==;y==Yes;n==No', '', '', '', '', '', 18, 3, '', 'YNdropdown', 2, ''),
(60, 'reportedInjuries', 'Did the employee have any previously reported injuries?', 'VARCHAR', 5, 0, 0, '', '==;y==Yes;n==No', '', '', '', '', '', 19, 3, '', 'YNdropdown', 2, ''),
(61, 'processInfluenced', 'Did process contribute to the accident?', 'VARCHAR', 5, 0, 0, '', '==;y==Yes;n==No', '', '', '', '', '', 20, 3, '', 'YNdropdown', 2, ''),
(62, 'jobsiteHazardContributed', 'Did a job site hazard contribute to the incident?', 'VARCHAR', 5, 0, 0, '', '==;y==Yes;n==No', '', '', '', '', '', 21, 3, '', 'YNdropdown', 2, ''),
(63, 'playSports', 'Does the employee actively play sports?', 'VARCHAR', 5, 0, 0, '', '==;y==Yes;n==No', '', '', '', '', '', 22, 0, '', 'YNdropdown', 2, ''),
(64, 'siteSafetyAssessment', 'Was a site safety assessment completed?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 1, 3, '', 'YNdropdown', 4, ''),
(65, 'assessmentReviewed', 'Was the assessment reviewed by the worker?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 2, 3, '', 'YNdropdown', 4, ''),
(66, 'sourceOnSafetyAssessment', 'Was the source identified on the site safety assessment?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 3, 3, '', 'YNdropdown', 4, ''),
(67, 'assessmentAdequate', 'Was the site safety assessment adequate?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 4, 3, '', 'YNdropdown', 4, ''),
(68, 'toolboxCompleted', 'Was a safety toolbox meeting completed?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 5, 3, '', 'YNdropdown', 4, ''),
(69, 'workerAttendToolbox', 'Did the worker attend the toolbox meeting? ', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 6, 3, '', 'YNdropdown', 4, ''),
(70, 'sourceInToolbox', 'Was the source identified in the toolbox meting?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 7, 3, '', 'YNdropdown', 4, ''),
(71, 'toolboxAdequate', 'Was the toolbox meeting adequate?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 8, 3, '', 'YNdropdown', 4, ''),
(72, 'safeWorkPracticeAvailable', 'Was a safe work practice available?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 9, 3, '', 'YNdropdown', 4, ''),
(73, 'safeworkPracticeReviewed', 'Was the safe work practice reviewed by the worker?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 10, 3, '', 'YNdropdown', 4, ''),
(74, 'procedureAvailable', 'Was a safe work procedure available?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 11, 3, '', 'YNdropdown', 4, ''),
(75, 'procedureReviewed', 'Was the safe work procedure reviewed by the worker', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 12, 3, '', 'YNdropdown', 4, ''),
(76, 'injurySource', 'Source of Injury', 'SELECT', 0, 0, 1, '', '', '', '', '', '', '', 1, 3, '', 'horRadioGroup', 5, ''),
(77, 'typeHazard', 'Type of Hazard', 'SELECT', 0, 0, 1, '', '', '', '', '', '', '', 2, 3, '', '_hazardType', 5, '_hazardType'),
(78, 'descriptionTasks', 'Description of work tasks being performed at the time of incident.', 'TEXT', 10000, 0, 1, '', '', '', '', '', '', '', 3, 3, '', '', 5, ''),
(79, 'equipmentUsed', 'Equipment / Tool / Substance being used at the time of incident.', 'TEXT', 10000, 0, 2, '', '', '', '', '', '', '', 4, 3, '', '', 5, ''),
(80, 'siteSafetyStatus', 'Site Safety Action Assessment was:', 'VARCHAR', 50, 0, 1, '', 'Incomplete==Incomplete;Appropriate==Appropriate;Improper==Improper;Inadequate==Inadequate', '', '', '', '', '', 5, 3, '', '', 5, ''),
(81, 'probabilityReocurrence', 'Probability of Reoccurence', 'VARCHAR', 50, 0, 1, '', 'None==None;Low==Low;Moderate==Moderate;High==High', '', '', '', '', '', 6, 3, '', '', 5, ''),
(82, 'probableCause', 'Probable Cause (What action or failure to act directly caused the incident?)', 'SELECT', 255, 0, 1, '', '', '', '', '', '', '', 1, 3, '', '', 6, ''),
(83, 'primaryCauseDescription', 'Add Brief Description of Primary Causes', 'TEXT', 10000, 0, 1, '', '', '', '', '', '', '', 2, 2, '', '', 6, ''),
(84, 'remedialAction', 'What remedial action has been or will be taken to prevent recurrence?', 'SELECT', 0, 0, 1, '', '', '', '', '', '', '', 1, 3, '', 'remedialaction', 7, ''),
(85, 'witness1Name', 'Witness 1 Name', 'VARCHAR', 255, 0, 0, '', '', '', '', '', '', '', 1, 2, '', '', 8, ''),
(86, 'witness1Contact', 'Enter Contact Details', 'VARCHAR', 500, 0, 0, '', '', '', '', '', '', '', 2, 2, '', '', 8, ''),
(87, 'witness1Statement', 'Enter Witness Statement', 'TEXT', 10000, 0, 0, '', '', '', '', '', '', '', 3, 2, '', '', 8, ''),
(88, 'witness2Name', 'Witenss 2 Name', 'VARCHAR', 255, 0, 0, '', '', '', '', '', '', '', 4, 2, '', '', 8, ''),
(89, 'witness2Contact', 'Enter Witness Statement', 'VARCHAR', 500, 0, 0, '', '', '', '', '', '', '', 5, 2, '', '', 8, ''),
(90, 'witness2Statement', 'Enter Witness Statement', 'TEXT', 10000, 0, 0, '', '', '', '', '', '', '', 6, 2, '', '', 8, ''),
(91, 'firstAidAdministered', 'Worker Received First Aid at Site?', 'VARCHAR', 5, 0, 0, '', '==;y==Yes;n==No', '', '', '', '', '', 7, 3, '', 'YNdropdown', 8, ''),
(92, 'firstAidReport', 'Was a first aid report available?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 8, 2, '', 'YNdropdown', 8, ''),
(93, 'firstAidAttendant', 'First Aid Attendant', 'VARCHAR', 255, 0, 0, '', '', '', '', '', '', '', 9, 2, '', '', 8, ''),
(94, 'attendantContactInfo', 'First Aid Attendant Contact Info', 'VARCHAR', 255, 0, 0, '', '', '', '', '', '', '', 10, 2, '', '', 8, ''),
(95, 'firstAidNotes', 'First Aid Report Notes', 'TEXT', 10000, 0, 0, '', '', '', '', '', '', '', 11, 2, '', '', 8, ''),
(96, 'clinicHospital', 'Did the worker got to a clinic or hospital?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 12, 2, '', 'YNdropdown', 8, ''),
(97, 'returnWorkReport', 'Physician''s Return to Work Report Available?', 'VARCHAR', 5, 0, 1, '', '==;y==Yes;n==No', '', '', '', '', '', 13, 2, '', 'YNdropdown', 8, ''),
(98, 'clinicHospitalReport', 'Clinic/Hospital Report Noted', 'TEXT', 10000, 0, 2, '', '', '', '', '', '', '', 14, 2, '', '', 8, ''),
(99, 'investigator1', 'Investigator (Completed Form)', 'VARCHAR', 255, 0, 1, '', '', '', '', '', '', '', 15, 2, '', 'investigator', 8, ''),
(100, 'investigator2', 'Investigator', 'VARCHAR', 255, 0, 1, '', '', '', '', '', '', '', 16, 2, '', 'investigator', 8, ''),
(101, 'worker1', 'Worker', 'VARCHAR', 255, 0, 1, '', '', '', '', '', '', '', 17, 2, '', 'investigator', 8, ''),
(102, 'worker2', 'Worker', 'VARCHAR', 255, 0, 1, '', '', '', '', '', '', '', 18, 2, '', 'investigator', 8, ''),
(103, 'worker3', 'Worker', 'VARCHAR', 255, 0, 1, '', '', '', '', '', '', '', 19, 2, '', 'investigator', 8, ''),
(104, 'result', 'Result', 'TEXT', 10000, 0, 1, '', '', '', '', '', '', '', 1, 2, '', '', 9, ''),
(105, 'conclusion', 'Conclusion', 'TEXT', 10000, 0, 1, '', '', '', '', '', '', '', 2, 2, '', '', 9, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report`
--

CREATE TABLE IF NOT EXISTS `tbl_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` int(3) NOT NULL,
  `branch` varchar(128) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0-Preliminary, 1 Commitable, 2 committed',
  `reportDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ownerId` int(5) NOT NULL COMMENT 'The user who created the report',
  `firstName` varchar(255) NOT NULL DEFAULT '',
  `lastName` varchar(255) NOT NULL DEFAULT '',
  `dateIncident` date NOT NULL DEFAULT '0000-00-00',
  `incidentaddress` varchar(500) NOT NULL DEFAULT '',
  `incidentDetails` text NOT NULL,
  `gender` varchar(2) NOT NULL DEFAULT '',
  `dateOfBirth` date NOT NULL DEFAULT '0000-00-00',
  `age` int(2) NOT NULL DEFAULT '0',
  `employeeNumber` varchar(10) NOT NULL DEFAULT '',
  `mailingAddress` varchar(256) NOT NULL DEFAULT '',
  `localAddress` varchar(256) NOT NULL DEFAULT '',
  `department` varchar(128) NOT NULL DEFAULT '',
  `yearscompany` int(11) NOT NULL DEFAULT '0',
  `yearsDepartment` int(3) NOT NULL DEFAULT '0',
  `investigator` varchar(256) NOT NULL DEFAULT '',
  `dateInvestigated` date NOT NULL DEFAULT '0000-00-00',
  `dateReported` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reportedTo` varchar(256) NOT NULL DEFAULT '',
  `employeeSupervisor` varchar(256) NOT NULL DEFAULT '',
  `shiftStartTime` time NOT NULL DEFAULT '00:00:00',
  `jobNumber` int(10) NOT NULL DEFAULT '0',
  `incidentClassification` varchar(255) NOT NULL DEFAULT '',
  `whilePerforming` varchar(3) NOT NULL DEFAULT '',
  `injuryType` varchar(255) NOT NULL DEFAULT '',
  `injuryDescription` varchar(10000) NOT NULL DEFAULT '',
  `bodyPartHead` varchar(255) NOT NULL DEFAULT '',
  `bodyPartUpperBody` varchar(255) NOT NULL DEFAULT '',
  `bodyPartLowerBody` varchar(255) NOT NULL DEFAULT '',
  `wasWorking` varchar(5) NOT NULL DEFAULT '',
  `workedOvertime` varchar(5) NOT NULL DEFAULT '',
  `CATevent` varchar(5) NOT NULL DEFAULT '',
  `sentHome` varchar(5) NOT NULL DEFAULT '',
  `reportNextDay` varchar(5) NOT NULL DEFAULT '',
  `lostTime` varchar(5) NOT NULL DEFAULT '',
  `returnSameDay` varchar(5) NOT NULL DEFAULT '',
  `reportedInjuries` varchar(5) NOT NULL DEFAULT '',
  `processInfluenced` varchar(5) NOT NULL DEFAULT '',
  `jobsiteHazardContributed` varchar(5) NOT NULL DEFAULT '',
  `playSports` varchar(5) NOT NULL DEFAULT '',
  `siteSafetyAssessment` varchar(5) NOT NULL DEFAULT '',
  `assessmentReviewed` varchar(5) NOT NULL DEFAULT '',
  `sourceOnSafetyAssessment` varchar(5) NOT NULL DEFAULT '',
  `assessmentAdequate` varchar(5) NOT NULL DEFAULT '',
  `toolboxCompleted` varchar(5) NOT NULL DEFAULT '',
  `workerAttendToolbox` varchar(5) NOT NULL DEFAULT '',
  `sourceInToolbox` varchar(5) NOT NULL DEFAULT '',
  `toolboxAdequate` varchar(5) NOT NULL DEFAULT '',
  `safeWorkPracticeAvailable` varchar(5) NOT NULL,
  `safeworkPracticeReviewed` varchar(5) NOT NULL DEFAULT '',
  `procedureAvailable` varchar(5) NOT NULL DEFAULT '',
  `procedureReviewed` varchar(5) NOT NULL DEFAULT '',
  `injurySource` varchar(0) NOT NULL DEFAULT '',
  `typeHazard` varchar(0) NOT NULL DEFAULT '',
  `descriptionTasks` text NOT NULL,
  `equipmentUsed` text NOT NULL,
  `siteSafetyStatus` varchar(0) NOT NULL DEFAULT '',
  `probabilityReocurrence` varchar(0) NOT NULL DEFAULT '',
  `probableCause` varchar(255) NOT NULL DEFAULT '',
  `primaryCauseDescription` text NOT NULL,
  `remedialAction` varchar(0) NOT NULL DEFAULT '',
  `witness1Name` varchar(255) NOT NULL DEFAULT '',
  `witness1Contact` varchar(500) NOT NULL DEFAULT '',
  `witness1Statement` text NOT NULL,
  `witness2Name` varchar(255) NOT NULL DEFAULT '',
  `witness2Contact` varchar(500) NOT NULL DEFAULT '',
  `witness2Statement` text NOT NULL,
  `firstAidAdministered` varchar(5) NOT NULL DEFAULT '',
  `firstAidReport` varchar(5) NOT NULL DEFAULT '',
  `firstAidAttendant` varchar(255) NOT NULL DEFAULT '',
  `attendantContactInfo` varchar(255) NOT NULL DEFAULT '',
  `firstAidNotes` text NOT NULL,
  `clinicHospital` varchar(0) NOT NULL DEFAULT '',
  `returnWorkReport` varchar(5) NOT NULL DEFAULT '',
  `clinicHospitalReport` text NOT NULL,
  `investigator1` varchar(255) NOT NULL DEFAULT '',
  `investigator2` varchar(255) NOT NULL DEFAULT '',
  `worker1` varchar(255) NOT NULL DEFAULT '',
  `worker2` varchar(255) NOT NULL DEFAULT '',
  `worker3` varchar(255) NOT NULL DEFAULT '',
  `result` text NOT NULL,
  `conclusion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_report`
--

INSERT INTO `tbl_report` (`id`, `company`, `branch`, `status`, `reportDate`, `ownerId`, `firstName`, `lastName`, `dateIncident`, `incidentaddress`, `incidentDetails`, `gender`, `dateOfBirth`, `age`, `employeeNumber`, `mailingAddress`, `localAddress`, `department`, `yearscompany`, `yearsDepartment`, `investigator`, `dateInvestigated`, `dateReported`, `reportedTo`, `employeeSupervisor`, `shiftStartTime`, `jobNumber`, `incidentClassification`, `whilePerforming`, `injuryType`, `injuryDescription`, `bodyPartHead`, `bodyPartUpperBody`, `bodyPartLowerBody`, `wasWorking`, `workedOvertime`, `CATevent`, `sentHome`, `reportNextDay`, `lostTime`, `returnSameDay`, `reportedInjuries`, `processInfluenced`, `jobsiteHazardContributed`, `playSports`, `siteSafetyAssessment`, `assessmentReviewed`, `sourceOnSafetyAssessment`, `assessmentAdequate`, `toolboxCompleted`, `workerAttendToolbox`, `sourceInToolbox`, `toolboxAdequate`, `safeWorkPracticeAvailable`, `safeworkPracticeReviewed`, `procedureAvailable`, `procedureReviewed`, `injurySource`, `typeHazard`, `descriptionTasks`, `equipmentUsed`, `siteSafetyStatus`, `probabilityReocurrence`, `probableCause`, `primaryCauseDescription`, `remedialAction`, `witness1Name`, `witness1Contact`, `witness1Statement`, `witness2Name`, `witness2Contact`, `witness2Statement`, `firstAidAdministered`, `firstAidReport`, `firstAidAttendant`, `attendantContactInfo`, `firstAidNotes`, `clinicHospital`, `returnWorkReport`, `clinicHospitalReport`, `investigator1`, `investigator2`, `worker1`, `worker2`, `worker3`, `result`, `conclusion`) VALUES
(1, 0, '', 0, '2014-09-11 03:45:09', 1, 'Aaron', 'Kennedy', '2014-09-08', '', 'Hello that is great\r\n', '8', '1979-07-20', 35, '', '813-250 E 6th Ave', '', '', 2, 1, '', '2014-09-04', '2014-09-07 20:45:00', 'Turbo', 'Superman', '00:00:00', 0, 's:0:"";', '', 's:0:"";', '', 's:0:"";', 's:0:"";', 's:0:"";', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'y', '', '', '', '', '', 'dfgdfgd', 'fgdfgdfg', '', '', 's:0:"";', '', '', '', '', '', '', '', '', 'y', 'n', '', '', '', '', 'y', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subconfigs`
--

CREATE TABLE IF NOT EXISTS `tbl_subconfigs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mode` varchar(10) NOT NULL DEFAULT 'sandbox' COMMENT 'will associate with mode in mainconfig',
  `merchant_url` varchar(255) NOT NULL DEFAULT 'https://secure.evoepay.com/api/transact.php',
  `merchant_cid` int(11) DEFAULT '1000001',
  `merchant_user_id` varchar(30) NOT NULL DEFAULT 'demo',
  `merchant_password` varchar(30) NOT NULL DEFAULT 'password',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_subconfigs`
--

INSERT INTO `tbl_subconfigs` (`id`, `mode`, `merchant_url`, `merchant_cid`, `merchant_user_id`, `merchant_password`) VALUES
(1, 'evo_live', 'https://secure.evoepay.com/api/transact.php', NULL, 'GRI04832', '701gridbid'),
(2, 'sandbox', 'https://secure.evoepay.com/api/transact.php', 1000001, 'demo', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `lastvisit` int(10) NOT NULL DEFAULT '0',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=735 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`, `activkey`, `createtime`, `lastvisit`, `superuser`, `status`) VALUES
(1, 'aaron_1', '28a34010e84b881fb087359c7e280a08', 'aaron@dmkdesign.ca', 'f54887b86d1e34be64a5fd77af8c3e6f', 1328569387, 1404407477, 1, 1),
(733, 'aaron_super', '28a34010e84b881fb087359c7e280a08', 'akennedy69@msn.com', '2f59b9eaa823c46f6dc2b909a4f0e79c', 1403152192, 1404233311, 0, 1),
(734, 'minion1', '28a34010e84b881fb087359c7e280a08', 'aaron.kennedy79@gmail.com', '4b5583aa4c67267b12e3933f5657204e', 1404231843, 1404232842, 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
