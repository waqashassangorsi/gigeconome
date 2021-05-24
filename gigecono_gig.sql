-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 24, 2021 at 04:12 AM
-- Server version: 10.3.28-MariaDB-log-cll-lve
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gigecono_gig`
--

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `value` text NOT NULL,
  `status` enum('Client','Freelancer') NOT NULL DEFAULT 'Client'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `badges`
--

INSERT INTO `badges` (`id`, `name`, `value`, `status`) VALUES
(1, 'on completion of 1st project', 'uploads/cover5.jpg', 'Client'),
(2, '1000$ earning', 'uploads/corona9.png', 'Client'),
(3, '5000$ earning', '', 'Client'),
(4, '100 project completion', '', 'Client'),
(5, '1000$  milestone release', '', 'Freelancer'),
(6, '5,000$ milestone release', '', 'Freelancer'),
(7, '100 project completion', '', 'Freelancer'),
(8, '10,000$ milestone release', '', 'Freelancer'),
(9, '50,000 $ milestone release', '', 'Freelancer');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `blogheading` text NOT NULL,
  `blogdescription` text NOT NULL,
  `date` date NOT NULL,
  `image` text NOT NULL,
  `author` text NOT NULL,
  `somtext` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `blogheading`, `blogdescription`, `date`, `image`, `author`, `somtext`) VALUES
(15, ' Business in decline? Or ready to expand?', '<p><strong>Business in decline? Or ready to expand? Professional freelancers are the solution</strong></p>\r\n\r\n<p>There can be no denying it: we are living in unprecedented times. Covid-19 has impacted businesses in a way we have never seen, certainly not in the Western world at least.&nbsp;</p>\r\n\r\n<p>In the UK, the Business Impact of Coronavirus (COVID-19) Survey report more than 1 in 10 currently trading UK businesses said turnover had decreased by more than 50% compared with what would be expected for this time of year.</p>\r\n\r\n<p>And footfall at businesses where they track such information is down 36% compared to this time in 2020 according to Springboard, a leading provider of data and intelligence on customer activity.</p>\r\n\r\n<p>But businesses and their owners continue to be resilient and find ways of getting through these hugely challenging times. Figures from Companies House show voluntary dissolutions are actually lower than at this time in 2020 and only slightly higher than in 2019. And in the last week there were almost 16,000 businesses incorporated, which is more than the same week in the previous two years.</p>\r\n\r\n<p>Now it is too early in the year to read too much into those figures considering we have just come out of the Christmas and New Year period when a lot of businesses pause any way and there are other figures out there which could paint a different picture &ndash; as the old saying goes &lsquo;there are lies, damned lies and statistics&rsquo;.&nbsp;</p>\r\n\r\n<p>But what the above does show is two things: challenging times are certainly ahead for companies of all shapes and sizes but for the large majority, business goes on and we have to find a way to make it work (see what I did there!).</p>\r\n\r\n<p>Regardless of whether your business is big or small, whether you have turned Covid into a positive for your company or if you are on the brink, you will almost certainly need different skillsets over the course of the coming months.&nbsp;</p>\r\n\r\n<p>Now depending on the size of your operation, the traditional way of solving such situations would be to either hire a new member of staff, recruit an agency or if you are a one-man band, beg, steal and borrow the help of friends and family.&nbsp;</p>\r\n\r\n<p>Now there is still a lot to be said for the latter so make the most of that where you can! But in an age where technology is playing an increasing role in the success of businesses regardless of the sector, you can find the solution to most of your problems through professional freelancers.</p>\r\n\r\n<p>If this is a totally new concept to you and you don&rsquo;t know where to start, then I would encourage you to read our article on<a href=\"https://gig.coviknow.com/Blogtest/firstpage/15\"> &lsquo;How to grow your business without expensive fixed costs&rsquo;</a>&nbsp;where we actually provide a simple seven-step plan to get started &ndash; we are nice like that. But below we explain how help from highly-skilled freelancers can transform your business regardless of size.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Freelancers for small businesses&nbsp;</strong></p>\r\n\r\n<p>If you are a business or an individual who tries to do most things involving your business on your own then hopefully you are having success and it is working for you. But in all likelihood, you are probably spending time learning just a basic understanding of certain skills when you could be using that time to actually make money by doing what you are good at.&nbsp;</p>\r\n\r\n<p>Instead of generating revenue for your business and developing your client base, you are learning how to do things which students in their first year of university for that subject probably know already. Now that is not meant to belittle your achievements thus far. Far from it. But I am going to ask you a few questions:&nbsp;</p>\r\n\r\n<ul>\r\n	<li>How many hours of your time have you invested learning that skill and then subsequently trying to implement it?&nbsp;</li>\r\n	<li>What is your hourly rate?</li>\r\n	<li>If you multiply the hours spent by your hourly rate, what is the figure?</li>\r\n</ul>\r\n\r\n<p>Now I&rsquo;m going to ask you a couple more questions:</p>\r\n\r\n<ul>\r\n	<li>Do you think an expert in that field could have achieved better results?</li>\r\n	<li>Have you looked into how much an expert would charge per hour to do the same work?</li>\r\n</ul>\r\n\r\n<p>I suspect the answer to that last question is probably no and as much as you might be proud of the new skill you have learned, I suspect if you are honest with yourself you could have achieved better results from an expert in the field.</p>\r\n\r\n<p>There is a lot to be said about learning new skills and having an understanding is certainly not a bad thing. But when it comes to end results and cost-benefit analysis, I guarantee you would have been better of looking at the professional freelance market.&nbsp;</p>\r\n\r\n<p>If you take a freelance website such as ours at GigeconoMe for example, we have sections which cater for some of the most important skills you need as a small business, well any size company for that matter, including:&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Freelance web developer or app developer: Your website and how it performs will be critical to your business regardless of size.</li>\r\n	<li>Freelance copywriter: It is no good having a great website or product if no one knows you exist. Help from friends and family on Facebook can only get you so far.</li>\r\n	<li>Freelance graphic designer: How your website, social media posts or business documents look can be the difference between success or failure.</li>\r\n</ul>\r\n\r\n<p>And the above are just some of the areas where you can find specialist skills which can transform your business at sites like GigeconoMe. Freelance IT analysts, cyber security freelancers, freelance data scientists and engineers...a host of industry experts are available at hourly rates or for set fees which can be agreed in advance of the work.&nbsp;</p>\r\n\r\n<p>When you consider the amount of lost time learning and researching these new skills and all the areas you need to factor into your business, professional freelancers can save you time, money and give you better end results.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Big businesses looking for freelancers</strong></p>\r\n\r\n<p>If you have skipped past the section above aimed at helping smaller companies and individual businesses owners, you might still want to skim over it as there is still helpful information in there. But if you are a more established business, regardless of whether you are looking to expand or suffering with the effects of Covid-19, then professional freelancers can still be your solution.</p>\r\n\r\n<p>There are some very obvious benefits, including:</p>\r\n\r\n<ul>\r\n	<li>Can easily match increased supply with demand in a matter of hours.</li>\r\n	<li>Talent shortage in your area is not a problem when you can source the best talent from around the world.</li>\r\n	<li>Freelancers can be added to projects in an agile way and Covid-19 has proven remote working and collaboration can go hand-in-hand.</li>\r\n	<li>Save money and improve results by paying a specialist for a short period of time, rather than hiring someone locally on a full-time wage for worse results.</li>\r\n	<li>Millennials are increasingly looking to work in the professional freelance market compared to their parents</li>\r\n	<li>With time you can build up a reliable network of professional freelancers you can call upon whenever needed.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Several Fortune 500 companies in the United States have already started increasing the amount they rely on professional freelancers and that is predicted to grow exponentially in the coming years.</p>\r\n\r\n<p>European and British companies are expected to follow suit so if you want to get ahead of the competition, all while saving money and improving results, then now is the time to dedicate some of your budget to the use of professional freelancers.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2021-03-02', 'https://images.pexels.com/photos/39811/pexels-photo-39811.jpeg?h=350&auto=compress&cs=tinysrgb', 'Muhammad Hamza', 'There can be no denying it: we are living in unprecedented times.'),
(14, 'How to grow your business without expensive fixed costs', '<p><strong>How to grow your business without expensive fixed costs</strong></p>\r\n\r\n<p>It&rsquo;s tried and tested. You recruit some staff, they work in an office from 9 to 5 under the guidance of line management and as your business grows, you hire more staff and if needed, you increase your office space. It is how things have been done and for many, it is how they will continue to work.&nbsp;</p>\r\n\r\n<p>But what happens when you lose your two most valuable clients in the space of a month for reasons out of your control? What happens when you hire that specialist only for the client to pull out six months into the contract? And do you really need to pay the web developer you hired on &pound;35,000 per year once he has built your website and is only needed for improvements and bug fixes?</p>\r\n\r\n<p>The truth is a lot of businesses are paying more for salaries, office rental, equipment and in agency fees than they need to. If only there was a way you could scale your staff up &ndash; and crucially down &ndash; as needed without the long-term financial commitment I hear you ask? If only you could source staff on a temporary basis who lived further away than Mo Farah runs on an afternoon jog I see you wondering.</p>\r\n\r\n<p>Well you can and in this article I will explain how you can introduce your business to the world of professional freelancers with minimum risk to your company.</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<p><strong>Benefits of using professional freelancers</strong></p>\r\n\r\n<p>Now it would take one brave &ndash; and arguably foolish &ndash; business leader to go from a full-time staff to switching completely over to professional freelancers overnight. And in truth, very few businesses would want to do that long-term any way as you will always need key employed staff at the heart of your business. But there are some huge benefits to using freelance workers instead of full-time staff. These include:</p>\r\n\r\n<ul>\r\n	<li>Reduced fixed costs such as salaries, office rental and equipment</li>\r\n	<li>Improve speed your business can match supply with demand</li>\r\n	<li>Total flexibility when it comes to increasing and decreasing staffing levels</li>\r\n	<li>Can source the best talent from around the world rather than just those near your office</li>\r\n	<li>More affordable billing rates due to lower overall costs</li>\r\n	<li>And the above will all help you secure an advantage over your competitors</li>\r\n</ul>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<p><strong>How businesses can have a low risk start to using freelance workers</strong></p>\r\n\r\n<p>The benefits of using highly-skilled freelancers are clear to see. But how do you make that initial jump? Well the good news is it is simple and you can do so at minimal risk to your business. Here are seven steps to help introduce talented freelancers into your business.</p>\r\n\r\n<ol>\r\n	<li>Decide which project or department could do with an extra pair of hands, for example if there is a mini project which needs working on.</li>\r\n	<li>Ask the HR manager or department head to visit a freelance website such as GigeconoMe to look for suitable professional freelancers.</li>\r\n	<li>It will not take them long to assess the most suitable candidates as at sites like GigeconoMe you can see someone&rsquo;s profile, past work, references and rough pricing in an instant.</li>\r\n	<li>Once you have decided on the person, approach them with the proposed freelance work and agree on a price.</li>\r\n	<li>This person will most likely be available within a matter of days if not that day. Then it is a case of letting them work on the mini task under clear guidance from the line manager.</li>\r\n	<li>In all likelihood if your HR manager has done their job properly, the freelancer will have knocked your socks off with the speed, quality and accuracy of their work.</li>\r\n	<li>Then like with any new full-time members of staff you hire, for the next role you give them even more responsibility and freedom and you will inevitably be left impressed once more. You are then well on your way to introducing professional freelancers into your business.</li>\r\n</ol>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<p><strong>How businesses can increase the role of freelance workers&nbsp;</strong></p>\r\n\r\n<p>Now the seven-step freelance model above can obviously be replicated for any sector or industry. And the good thing about sites such as GigeconoMe is they usually have sections of their site dedicated to certain industries. For example at GigeconoMe we are currently focussing on:</p>\r\n\r\n<ul>\r\n	<li>Cyber security freelancers</li>\r\n	<li>Freelance data scientists and data engineers&nbsp;</li>\r\n	<li>IT analysts freelancers</li>\r\n	<li>Freelance web and app developers&nbsp;</li>\r\n	<li>Graphic design freelancers</li>\r\n	<li>Those in freelance content marketing</li>\r\n</ul>\r\n\r\n<p>Often when a business has had some success with online freelancers, they start to assemble a &lsquo;talent cloud&rsquo;, which consists of professional freelancers who are already pre-vetted and well-versed in the ways of the business, which again is all possible at sites like GigeconoMe. Then when a new project or client becomes available, budget can be assigned for the highly-skilled freelancers in the talent cloud and more often than not, each freelancer blocks out a certain amount of their time for that client in the coming weeks and months.</p>\r\n\r\n<p>Now depending on the size of your business and the speed of turnaround, you may decide you want to have a few options when it comes to freelancers. But by following the above, you can do so in a way which provides minimal risk to your business, will save you a lot of money and crucially, will take your company to a new level.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2021-03-02', 'https://images.pexels.com/photos/129105/pexels-photo-129105.jpeg?h=350&auto=compress&cs=tinysrgb', 'Muhammad Hamza', 'It&rsquo;s tried and tested. You recruit some staff, they work in an office from 9 to 5 under the guidance of line management and as your business grows, you hire more staff and if needed, you increase your office space. It is how things have been done and for many, it is how they will continue to work.&nbsp;'),
(13, 'What is the gig economy? Why is professional freelancing different? ', '<p><strong>What is the gig economy? And why is professional freelancing different?&nbsp;</strong></p>\r\n\r\n<p>The gig economy. It is a term which most people will have heard of but unless you work within it, you may not fully understand it. Now, there is not a set definition for the term &lsquo;gig economy&rsquo; so I&rsquo;d ask if you could not show up at my door with a pitchfork in hand if you don&rsquo;t agree with my wording as it will vary, but in a nutshell it is where businesses use temporary workers to complete tasks rather than full-time employees and more often than not involves online apps or platforms.&nbsp;</p>\r\n\r\n<p>I&rsquo;m probably stating the obvious for many of you when I say the name comes from the idea of each item of work being a &lsquo;gig&rsquo; but I needed to state as much for those at the back of the room. Freelancing, temp roles, plus jobs in the sharing economy and collaborative economy can all come under the &lsquo;gig economy&rsquo; banner but in recent years the term has become synonymous with the low-skilled and low-paid workforce.</p>\r\n\r\n<p>If you only have a passing knowledge of what the gig economy is, there is a good chance you may have come across it due to recent scandals involving worker conditions and the like but there is so much more to the gig economy and whilst it has not always benefitted lower-paid workers in the past, online platforms have helped a host of professionals find freelance work and transform not just their working lives but their lives as a whole.&nbsp;</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<p><strong>Difference between gig workers and professional freelancers?</strong></p>\r\n\r\n<p>Before you get those pitchforks out again, I know that technically these terms can be the same thing. But whether we like it or not, the term gig economy is associated with low-paid workers for the time being and it might take a while longer for that to change. And that is why we think our name GigeconoMe is so clever. Our site is not geared towards those low-paid workers and industries. We are here to help you: the hard-working, highly-skilled professional freelancers and the companies who want to build their businesses around that talent, all while saving on expensive salary costs and agency fees.</p>\r\n\r\n<p>Freelance cyber security experts, freelance data scientists and data engineers, freelance web and app developers...these are just a handful of the sectors GigeconoMe are focussing on for the time being. When we are talking about professional freelancers, we are talking about people who can help take your business to the next level. We are talking about people who more often than not have chosen to work for themselves because they know the true value of their work.</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<p><strong>How GigeconoMe can help you find freelance jobs</strong></p>\r\n\r\n<p>Now you understand what the gig economy is and how professional freelancers fit into the mix, it is time to act. It takes less than ten minutes to set up a GigecomoMe account and it is free to join.</p>\r\n\r\n<p>The UK freelance market is already thriving and is expected to follow the US by growing exponentially in the coming years. If you are a professional freelancer, your GigeconoMe profile enables you to showcase your talent to potential employers. And if you are one of those business leaders smart enough to see the value of freelancers and freelance networks, then you can search by sector and find profiles with their projected costing in an instant.</p>\r\n\r\n<p>The statement of work can then be agreed between the parties and we do not receive our small&nbsp; percentage until the work has been completed. Simple. (or is it now law you have to say &lsquo;simples&rsquo; while doing so in the voice of a little meerkat?)</p>\r\n\r\n<p>From freelance IT analysts to content marketing freelancers and a host of skills in-between, GigeconoMe is <em>the</em> place where highly-skilled freelancers and innovative businesses come together through the power of technology.</p>\r\n', '2021-03-02', 'https://images.pexels.com/photos/129441/pexels-photo-129441.jpeg?h=350&auto=compress&cs=tinysrgb', 'Muhammad Hamza', 'The gig economy. It is a term which most people will have heard of but unless you work within it, you may not fully understand it.'),
(16, 'How to diversify your business and increase your talent pool whilst still saving money', '<p>&nbsp;</p>\r\n\r\n<p><strong>How to diversify your business and increase your talent pool whilst still saving money</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Diversification. Whether you are a business looking to expand off the back of success during the last year or if you are one of the many businesses who have paid the price due to the Covid pandemic, diversification is a term which is likely to have come up in your business meetings in the last few months.</p>\r\n\r\n<p>The process of diversifying can be a daunting one though. If you move away from your core services, will it reduce your ability to deliver what has served you so well thus far? And can we afford to move out of our comfort zone when the market is so volatile right now?</p>\r\n\r\n<p>Well your friendly neighbourhood Chris (can you tell I&rsquo;ve been working my way through The Avengers&rsquo; films in recent weeks?) is here to explain why diversifying your business can be done in a safe and affordable way with the help of professional freelancers.</p>\r\n\r\n<p>Diversifying can be done in many different ways. You could be planning a radical switch into a totally new sector or you might be looking to evolve in a more natural way. Whatever the situ (look at me being down with the kids), it can be done a lot easier than you might think and with online freelancers, the changes can be done on a temporary or permanent basis with minimal risk to your business.</p>\r\n\r\n<p>With freelance platform market sites like GigeconoMe, they have a host of sections where it is easy to find experts in a chosen field who can work on your project for a short period of time.&nbsp;</p>\r\n\r\n<p>For example, say you want to set up a totally new arm to your business and you need to create&nbsp; a new website. Well at GigeconoMe you can find freelance web and app developers, freelance data scientists and data engineers, and cyber security freelancers in separate areas of our site for those sectors. You are able to see a portfolio of their previous work, agree a price in advance and when the work is complete, you don&rsquo;t need to worry about having someone on the payroll who you no longer need or worry about paying over the odds in agency fees.</p>\r\n\r\n<p>Even if the diversification is a more gradual process, you can find highly-skilled freelancers from around the world who are experts in their field and you don&rsquo;t have to worry about things like increased office and equipment costs or being tied down to someone who you quickly find out isn&rsquo;t up to the job &ndash; don&rsquo;t worry, we&rsquo;ve all been there.</p>\r\n\r\n<p>Let&rsquo;s use a marketing or content agency as an example. If you have historically been focussed on one area and are now looking to offer your clients more services, it is easy to find freelance content marketers or graphic design freelancers at freelance websites like GigeconoMe.</p>\r\n\r\n<p>You are able to hugely improve the quality of your offering and improve the skills available within your team in a matter of hours as you don&rsquo;t need to worry about hiring full-time employees.</p>\r\n\r\n<p>And should the plan to diversify backfire or not work out as you planned, then it is easy to reduce your costs without needing to pay out large fees to employees or worry about the emotional trauma that comes with such a move when it is unfortunately required.</p>\r\n\r\n<p>If you are considering diversifying your business then don&rsquo;t be concerned. Look at it as the wonderful opportunity it is and let the professional freelancer market help revolutionise your business.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2021-03-02', 'https://images.pexels.com/photos/395196/pexels-photo-395196.jpeg?h=350&auto=compress&cs=tinysrgb', 'Muhammad Hamza', 'Diversification. Whether you are a business looking to expand off the back of success during the last year or if you are one of the many businesses who have paid the price due to the Covid pandemic, diversification is a term which is likely to have come up in your business meetings in the last few months.'),
(17, 'Where freelance cyber security professionals and data engineers meet innovative businesses ', '<p>&nbsp;</p>\r\n\r\n<p><strong>GigeconoMe: where freelance cyber security professionals and data engineers meet innovative businesses&nbsp;</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://cybersecurityventures.com/top-5-cybersecurity-facts-figures-predictions-and-statistics-for-2019-to-2021/#:~:text=1%20cyber%2Dattacked%20industry%20%E2%80%94%20will,fastest%20growing%20type%20of%20cybercrime.\">Cybersecurity Ventures</a> report worldwide cybercrime costs are predicted to reach $6 trillion annually by this year. That&rsquo;s around &pound;4.25 trillion to those of us on this side of The Pond. &pound;4.25 trillion. Let that just sink in for a moment.</p>\r\n\r\n<p>Yet your average Joe or business leader probably couldn&rsquo;t even name the different ways they could become a victim of cybercrime, let alone know how they should protect themselves from it.</p>\r\n\r\n<p>And unfortunately it is a problem which is only going to get worse, with the damage related to cybercrime expected to reach $10.5 trillion annually by 2025 and the FBI reporting a 300% increase in reported cybercrimes since the Covid pandemic began (<a href=\"https://www.imcgrupo.com/covid-19-news-fbi-reports-300-increase-in-reported-cybercrimes/\">IMC Grupo</a>).</p>\r\n\r\n<p>With increased numbers forced to work from home, often on personal laptops or on networks which lack the level of security required, it is a very real threat for all businesses.&nbsp;</p>\r\n\r\n<p>After all, if one of the richest men in the world, Elon Musk, and former US presidents can become victims of cybercrime by using Twitter then what hope do we have?</p>\r\n\r\n<p>Yet more than 70% of security executives expect their budgets for the 2021 fiscal year to reduce, not increase (<a href=\"https://www.esg-global.com/esg-issa-research-report-2020?utm_campaign=ESG%20Research&amp;utm_source=slider\">ESG &amp; ISSA</a>) so we can expect cyber security to dominate the headlines with increasing regularity in the coming years.</p>\r\n\r\n<p>The impact on businesses can be catastrophic. <a href=\"https://www.capita.com/sites/g/files/nginej146/files/2020-08/Ponemon-Global-Cost-of-Data-Breach-Study-2020.pdf\">IBM</a> report the average cost of a data breach is $3.86 million, while <a href=\"https://www.accenture.com/us-en/insights/security/cost-cybercrime-study\">Accenture</a> said the average cost of a malware attack on a company is $2.6 million. O and just to chuck another feel-good statistic your way, the reported cost of lost business averaged $1.52 million (<a href=\"https://www.capita.com/sites/g/files/nginej146/files/2020-08/Ponemon-Global-Cost-of-Data-Breach-Study-2020.pdf\">IBM</a>). A lot of these figures are US-based as you can see but you get the point.</p>\r\n\r\n<p>So by now hopefully we can all agree that if you are a business leader, cyber security should be near the top of your agenda and is something you need to act on. Fast.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>How to find freelance cyber security professionals and freelance data engineers?</strong></p>\r\n\r\n<p>The information security market is forecast to reach more than $170 billion worldwide in 2022 (<a href=\"https://www.gartner.com/en/documents/3889055\">Gartner</a>) and regardless of size, your business needs to take cyber security seriously. So where do you start?</p>\r\n\r\n<p>Thankfully the increase in threat has also been followed by an increase in the number of freelance cyber security experts who are able to help.</p>\r\n\r\n<p>Regardless of whether you are an individual online trader or a multi-billion pound corporation, the likes of freelance cyber security consultants, freelance cyber security developers and freelance data engineers can be easily found on freelance platform market sites like GigeconoMe.</p>\r\n\r\n<p>On sites like ours we have individual sections for different sectors of the industry and there you can find examples of the highly-skilled freelancers&rsquo; work, see their rough pricing and read reviews from other satisfied customers.</p>\r\n\r\n<p>You are then free to discuss the amount of work required, agree on a price and then off they go. And it is easy to scale up and down as required as your business hopefully grows or find an alternative if you need to find someone new.</p>\r\n\r\n<p>The threat of cyber attacks is something we all need to take incredibly seriously but by utilising the professional freelancer market, you can sleep easier knowing you are making not only yourself, but your clients and business partners safer.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2021-03-02', 'uploads/cyber2.jpeg', 'Muhammad Hamza', 'Cybersecurity Ventures report worldwide cybercrime costs are predicted to reach $6 trillion annually by this year.'),
(18, 'Debunking myths around why you shouldn\'t use freelancers', '<p>Rightly or wrongly, there is still a stigma attached to freelancers for many. When it comes to needing to expand, most business leaders still think the best solution is hiring a full-time employee, rather than opting for highly-skilled freelancers.</p>\r\n\r\n<p>We have already published several blogs which highlight the benefits of professional freelancers so I&rsquo;m not going to go over old ground here. Instead, I thought it would be best to challenge some of the misconceptions around using professional freelancers and why sites like GigeconoMe can minimise any risk you feel your business may face.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>&lsquo;It takes too long to find freelancers&rsquo;</strong></p>\r\n\r\n<p>Several years ago, if a business owner wanted to hire a freelancer then in all likelihood he or she would have probably opted for someone they knew or looked in their local newspaper classified adverts.&nbsp;</p>\r\n\r\n<p>Now whilst they are still options &ndash; lord knows your local newspaper probably needs all the help it can get &ndash; being able to find freelance support is quicker than ever before and in most cases is much quicker than seeking to hire a full-time member of staff.</p>\r\n\r\n<p>Professional freelance websites like ours at GigeconoMe have individual sections for specific sectors &ndash; for example cyber security freelancers or freelance web and app developers &ndash; so within a few minutes you can see a host of possible freelance workers.&nbsp;</p>\r\n\r\n<p>If you have a HR representative, get them to do the groundwork in the same way you would look for a new full-time employee and they can provide you with several options within the hour, as most sites like GigeconoMe include areas where other clients have left reviews and you can see examples of their work.</p>\r\n\r\n<p>When it comes to recruiting, securing a freelance expert is simply much quicker than securing a full-time employee.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>&lsquo;Freelancers are not as talented as specialists&rsquo;</strong></p>\r\n\r\n<p>An old manager once said to me: &ldquo;The only people who freelance are either: 1) At the top of their field and people search them out. Or 2) Those who are not good enough to get a full-time job.&rdquo;</p>\r\n\r\n<p>Unfortunately this is a view which in the past has been shared by many and is simply not true. What about the dad who wants to be able to do the school run? Or the person who needs to be at home more to care for a relative? Or someone who decided to leave a job she was unhappy in to find a better work-life balance?</p>\r\n\r\n<p>Increasingly more and more people are &lsquo;going freelance&rsquo; because it suits their life better and financially they can afford to do so.&nbsp;</p>\r\n\r\n<p>In particular, younger people are looking increasingly to the freelance market rather than the usual 9-to-5 model followed by their parents. Apparently kids nowadays actually want to have a life away from work.</p>\r\n\r\n<p>So as I&rsquo;ve mentioned, the freelance market isn&rsquo;t a place just for the expensive consultants and those who are not worthy. It is a vibrant marketplace full of experts who care deeply about their job and are ready to help your business grow today.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>&lsquo;But freelancers are expensive&rsquo;</strong></p>\r\n\r\n<p>Are they? Comparatively to a full-time employee, are they really? Have you even looked or considered whether that is indeed true?</p>\r\n\r\n<p>When you factor in the cost of not only the employee&rsquo;s wages over a full-year but the pension contributions, other company-wide perks like the life insurance that no one signs up for, office equipment and factors such as lost hours due to hearing about Barbara&rsquo;s new cat, is it really more expensive to hire a freelancer?</p>\r\n\r\n<p>Freelancers by their very nature will want to do as good a job as possible in as short a time as possible because they want to keep their clients happy while not having to work every hour God sends. Why would they want to overcharge and price themselves out of an ever-growing freelancer market where you are not short of options?</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>&lsquo;You can&rsquo;t hold freelancers to account&rsquo;</strong></p>\r\n\r\n<p>This is why freelancer contracts are king. Before any work begins, make sure there is a signed work agreement in place between you and the freelancer which clearly states what the work consists of, when it is expected to be completed, the payment terms and any amendment loops.</p>\r\n\r\n<p>Once that is in place, sites like GigeconoMe hold the money in escrow until the work is completed.</p>\r\n\r\n<p>The agreement ensures both parties are held to account and there can be no confusion around whether the work is of a high enough standard.</p>\r\n\r\n<p>The potential risks of missed deadlines and below-par standard of work can be minimised even further by ensuring regular check-in points with a member of your own team, in the same way a line manager would with a new full-time member of staff.</p>\r\n\r\n<p>Even if problems do arise, there are better freelancers out there and it is a lot easier to end your association with a freelancer than it is with a full-time member of staff.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>&lsquo;There is no quality assurance with freelancers&rsquo;</strong></p>\r\n\r\n<p>I would actually argue there is more quality assurance with freelancers.</p>\r\n\r\n<p>Firstly, at sites like GigeconoMe you can see not only a portfolio of the freelancer&rsquo;s work but also their reviews from other clients.&nbsp;</p>\r\n\r\n<p>Secondly, unlike full-time employees, you will not want a &lsquo;bedding in&rsquo; period where the person gets up to speed and has calls with every person in each department despite not probably speaking to them in the first year of employment. You will want to make the most of the time you have with your freelancer.</p>\r\n\r\n<p>Once you have decided on the person, you will want your in-house staff to provide very clear guidance and maybe even a mini task to see what they are capable of and in what time frame.</p>\r\n\r\n<p>If you want to be extra careful, you may even decide to have your in-house line manager set short-term targets and regular check-ins with the freelancer to make sure everything is on track.</p>\r\n\r\n<p>Not to mention the signed work agreement which means the expectations are very clear from the outset.</p>\r\n\r\n<p>So as you can see, the potential quality assurance &lsquo;problem&rsquo; can be solved with good management by you.</p>\r\n\r\n<p>Even if you are one of the unlucky few who end up disappointed with a freelancer&rsquo;s output, there are always better and more reliable freelancers out there and there is as much of a risk &ndash; if not more so &ndash; of the same thing happening when you hire a full-time member of staff. The mistake can certainly prove more costly!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>&lsquo;What happens if the freelancer receives a more lucrative freelance opportunity?&rsquo;</strong></p>\r\n\r\n<p>The chance of a freelancer deprioritising your work over someone else&rsquo;s is a possibility. But then if you have the signed work agreement in place, you have the set time frames and regular check-ins as I&rsquo;ve referred to already in place, then the freelancer who does not stick to those runs the risk of breaching the agreement and you won&rsquo;t lose your money.</p>\r\n\r\n<p>And it is stating the obvious but freelancers want to receive their money from you and hopefully secure more work from you in the future. So as long as you are paying them a fair rate, why would they not complete the work on time?&nbsp;</p>\r\n\r\n<p>If it is something you are overly concerned about, you could always work with a few different freelancers so you have options should you need a fallback but it goes back to what I said earlier, freelancer contracts are king and protect both parties.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>So as you can see from the above, a lot of the concerns around working with professional freelancers are outdated and incorrect. If you have any other worries holding you back from working with freelance experts, feel free to reach out at <a href=\"mailto:admin@gigeconome.com\">admin@gigeconome.com</a> and I would love to talk it through.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2021-03-04', 'uploads/freelancer_2.jpeg', 'Muhammad Hamza', 'Rightly or wrongly, there is still a stigma attached to freelancers for many'),
(19, 'Diversity, equality and inclusion: The freelancer market can help revolutionise your workforce', '<p>Evidence has shown that having a more diverse and inclusive workplace can provide tangible benefits for your business.</p>\r\n\r\n<p>Research conducted by <a href=\"https://www.greatplacetowork.com/resources/blog/racially-diverse-workplaces-have-largest-revenue-growth\">Great Place To Work</a> has found companies with a diverse and inclusive environment can enjoy higher revenue growth, show greater readiness to innovate and enjoy higher employee retention.</p>\r\n\r\n<p>And the organisation&rsquo;s <a href=\"https://www.greatplacetowork.com/resources/reports\">research on company culture</a> shows that when employees trust their company is treating everyone fairly regardless of race, gender, sexual orientation or age, they are:</p>\r\n\r\n<ul>\r\n	<li>9.8 times more likely to look forward to going to work</li>\r\n	<li>6.3 times more likely to have pride in their work</li>\r\n	<li>5.4 times more likely to want to stay a long time at their company</li>\r\n</ul>\r\n\r\n<p>With social and institutional injustice dominating headlines in the last 12 months, companies are rightly starting to take a harder look at their own organisations.</p>\r\n\r\n<p>The truth of the matter is there are certain industries where sections of our society are hugely underrepresented.</p>\r\n\r\n<p>Whether it is based on gender,&nbsp; age, race, religion or ethnicity, there are certain barriers in place for people which need to be removed.</p>\r\n\r\n<p>The <a href=\"https://gigeconome.com/\">freelancer market</a> is one way of being able to diversify with relative ease.</p>\r\n\r\n<p>At GigeconoMe, we hope to play our part in promoting positive change by helping <a href=\"https://gigeconome.com/\">professional freelancers</a> of all races, ethnicities, sexual orientation, abilities &ndash; well everyone &ndash; to find work based on their talent and to ensure everyone is granted equal opportunities to employment.</p>\r\n\r\n<p>One of the best things about a <a href=\"https://gigeconome.com/\">professional freelancer market</a> like GigeconoMe is that everyone can build a profile, everyone can showcase their work and everyone can build business relationships based on the quality of that work.</p>\r\n\r\n<p>Being the &lsquo;best person for the job&rsquo; regardless of who you are is at the very heart of GigeconoMe. There are no barriers.&nbsp;</p>\r\n\r\n<p>Whilst other platforms might pride themselves on giving businesses access to the cheapest labour possible, GigeconoMe wants to provide highly-skilled freelancers with a marketplace to earn the money their talent deserves. Whoever they are.</p>\r\n\r\n<p>If you are an established business, you may look at your current workforce and think &lsquo;we really aren&rsquo;t as diverse as we should be&rsquo;. But when those people have served you well for a long period of time, it wouldn&rsquo;t necessarily be fair to part ways with them either.</p>\r\n\r\n<p>Which is why the professional freelancer market can really help, because when it comes to your next big project or scaling up your resources, you are able to work with a wide range of people who you have maybe not considered before in a matter of minutes.</p>\r\n\r\n<p>Whether you want to proactively support underrepresented communities or simply find the best person for the job, sites like GigeconoMe can help you grow your business whilst still helping you become more diverse and more inclusive.</p>\r\n\r\n<p>The time for talking is over. It&rsquo;s time to revolutionise your workforce now.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2021-04-30', 'uploads/DI.jpeg', 'Chris', NULL),
(20, 'How GigeconoMe will stay true to its roots?', '<p>At GigeconoMe, our aim is to deliver <a href=\"https://gigeconome.com/\">highly-skilled freelancers</a> to the innovative businesses who need them most. That is it.&nbsp;</p>\r\n\r\n<p>If you want to understand why GigeconoMe exists, you can read about the near-death experience which led to the creation of the company on our <a href=\"https://gigeconome.com/AboutUs\">About Us</a> page.</p>\r\n\r\n<p>But at its core, our goal is to help those looking for work, find it. And help businesses who need a workforce, discover the best talent that is available. It is as simple as that.</p>\r\n\r\n<p>You will not have your data harvested to make us money. You will not receive connection requests from people who have no intention of working with you. You will not receive a barrage of time-consuming content which has no relevance to you. You will not see GigeconoMe as a waste of time.</p>\r\n\r\n<p>Our goal is simple: we want to help you &ndash; whether you are a freelance worker or a business &ndash; make money and then take a small commission as part of it. That is it.</p>\r\n\r\n<p>Changing business strategy if needed is obviously a positive &ndash; after all, if you stand still in business then you are arguably going backwards. So this is not a dig at other platforms.</p>\r\n\r\n<p>But we believe strongly in our business model and therefore plan to stick to our roots.</p>\r\n\r\n<p>As part of our planning ahead of launch, we took the time to fully understand the marketplace and we sought feedback from <a href=\"https://gigeconome.com/\">freelancers</a> and businesses around the world. We have listened to our target audience.</p>\r\n\r\n<p>And for that reason, we have no doubt there is a need for a platform like ours. The dynamics around businesses and their workforce are changing. Companies are going to increasingly move more towards a remote and/or freelance market in the coming years.</p>\r\n\r\n<p>So for GigeconoMe, the aim is simple: We want to provide highly-skilled freelancers with a professional marketplace where they can showcase their talents, a place where businesses can find them, and help all parties generate money.</p>\r\n\r\n<p>We plan to provide an affordable platform where everyone gets great value for money. No fuss. Total transparency. Free to sign-up. 100% value for money guaranteed.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2021-04-30', 'uploads/11.jpeg', 'Chris', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` text NOT NULL,
  `parent_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `status` text NOT NULL,
  `newimages` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `parent_id`, `image`, `status`, `newimages`) VALUES
(1, 'Programming &amp; Development', 0, 'assets/images/icon/progreming and tech.png', 'Active', 'uploads/worpress.jpg'),
(2, 'Writing & Translation', 0, 'assets/images/icon/writing & tranlation-8.png', 'Active', 'uploads/law.jpg'),
(3, 'Design & Art', 0, 'assets/images/icon/GRAPHICS DESIGN-8.png', 'Active', 'uploads/graphics.jpg'),
(4, 'Administrative & Secretary', 0, 'assets/images/icon/digital.png', 'Active', 'uploads/cyber.jpg'),
(5, 'Business & Finance', 0, 'assets/images/icon/data entry-8.png', 'Active', 'uploads/worpress.jpg'),
(6, 'Sales & Marketing', 0, 'assets/images/icon/seo.png', 'Active', 'uploads/law.jpg'),
(7, 'Engineering & Architecture', 0, 'assets/images/icon/video and aniamtion-8.png', 'Active', 'uploads/graphics.jpg'),
(8, 'Legal', 0, 'assets/images/icon/web.png', 'Active', 'uploads/cyber.jpg'),
(9, 'Other', 0, 'assets/images/icon/copywriting.png', 'Active', 'uploads/worpress.jpg'),
(314, 'Apps & Mobile', 1, '', 'Active', '0'),
(315, 'Concepts / Ideas / Documentation', 1, '', 'Active', '0'),
(316, 'Database Design & Admins', 1, '', 'Active', '0'),
(317, 'ERP / CRM / SCM', 1, '', 'Active', '0'),
(318, 'Game Development', 1, '', 'Active', '0'),
(319, 'Human Computer Interaction', 1, '', 'Active', '0'),
(320, 'Industry Specific', 1, '', 'Active', '0'),
(321, 'Information Security', 1, '', 'Active', '0'),
(322, 'Management / Leadership', 1, '', 'Active', '0'),
(323, 'Math / Algorithms / Analysis', 1, '', 'Active', '0'),
(324, 'Networking Hardware & Systems', 1, '', 'Active', '0'),
(325, 'Programming & Software', 1, '', 'Active', '0'),
(326, 'QA & Testing', 1, '', 'Active', '0'),
(327, 'SAP', 1, '', 'Active', '0'),
(328, 'Technical Support', 1, '', 'Active', '0'),
(329, 'Telephony / Telecommunication', 1, '', 'Active', '0'),
(330, 'Web / Digital Marketing', 1, '', 'Active', '0'),
(331, 'Web Development & Design', 1, '', 'Active', '0'),
(332, 'Academic', 2, '', 'Active', '0'),
(333, 'Articles & News', 2, '', 'Active', '0'),
(334, 'Books', 2, '', 'Active', '0'),
(335, 'Concepts / Ideas / Direct', 2, '', 'Active', '0'),
(336, 'Copywriting', 2, '', 'Active', '0'),
(337, 'Editing & Proofreading', 2, '', 'Active', '0'),
(338, 'General / Other Writing', 2, '', 'Active', '0'),
(339, 'Grants & Proposals', 2, '', 'Active', '0'),
(340, 'Industry Specific Experti', 2, '', 'Active', '0'),
(341, 'Instructional Design / E-', 2, '', 'Active', '0'),
(342, 'Jobs / Resumes', 2, '', 'Active', '0'),
(343, 'Research', 2, '', 'Active', '0'),
(344, 'Reviews & Testimonials', 2, '', 'Active', '0'),
(345, 'Scripts / Speeches / Stor', 2, '', 'Active', '0'),
(346, 'Songs & Poems', 2, '', 'Active', '0'),
(347, 'Technical ', 2, '', 'Active', '0'),
(348, 'Transcription', 2, '', 'Active', '0'),
(349, 'Translation', 2, '', 'Active', '0'),
(350, 'Web Content', 2, '', 'Active', '0'),
(351, 'Animation', 3, '', 'Active', '0'),
(352, 'Audio / Sound & Music', 3, '', 'Active', '0'),
(353, 'Cartoons / Comic Art', 3, '', 'Active', '0'),
(354, 'Concepts & Direction', 3, '', 'Active', '0'),
(355, 'Crafting', 3, '', 'Active', '0'),
(356, 'Dance / Music / Performin', 3, '', 'Active', '0'),
(357, 'Fashion', 3, '', 'Active', '0'),
(358, 'General / Other Art', 3, '', 'Active', '0'),
(359, 'Graphic Design', 3, '', 'Active', '0'),
(360, 'Illustration', 3, '', 'Active', '0'),
(361, 'Interiors / Exteriors / F', 3, '', 'Active', '0'),
(362, 'Modelling / Acting / Voic', 3, '', 'Active', '0'),
(363, 'Painting', 3, '', 'Active', '0'),
(364, 'Photo / Image Restoration', 3, '', 'Active', '0'),
(365, 'Photography', 3, '', 'Active', '0'),
(366, 'Printing & Production', 3, '', 'Active', '0'),
(367, 'Sculpting', 3, '', 'Active', '0'),
(368, 'Video / Film / TV / DVD', 3, '', 'Active', '0'),
(369, 'Bookkeeping & Finance', 4, '', 'Active', '0'),
(370, 'Customer Service', 4, '', 'Active', '0'),
(371, 'Data Entry', 4, '', 'Active', '0'),
(372, 'Email / Chat / Conferenci', 4, '', 'Active', '0'),
(373, 'Health & Medical', 4, '', 'Active', '0'),
(374, 'Insurance', 4, '', 'Active', '0'),
(375, 'Legal Assistance', 4, '', 'Active', '0'),
(376, 'Mailings & Lists', 4, '', 'Active', '0'),
(377, 'Microsoft Office Software', 4, '', 'Active', '0'),
(378, 'Personal / Virtual Assist', 4, '', 'Active', '0'),
(379, 'Planning & Scheduling', 4, '', 'Active', '0'),
(380, 'Presentation Design', 4, '', 'Active', '0'),
(381, 'Spreadsheets & Data Manip', 4, '', 'Active', '0'),
(382, 'Transcription', 4, '', 'Active', '0'),
(383, 'Web Research & Posting', 4, '', 'Active', '0'),
(384, 'Word Processing & Typing', 4, '', 'Active', '0'),
(385, 'Accounting & Finance', 5, '', 'Active', '0'),
(386, 'Business Consulting', 5, '', 'Active', '0'),
(387, 'Data Science & Analytics', 5, '', 'Active', '0'),
(388, 'ERP / CRM / SCM', 5, '', 'Active', '0'),
(389, 'Fund Raising / Raising Ca', 5, '', 'Active', '0'),
(390, 'Human Resources (HR)', 5, '', 'Active', '0'),
(391, 'Industry Specific Experti', 5, '', 'Active', '0'),
(392, 'SAP', 5, '', 'Active', '0'),
(393, 'Advertising', 6, '', 'Active', '0'),
(394, 'Affiliate & Referral Prog', 6, '', 'Active', '0'),
(395, 'Analysis / Data / Strateg', 6, '', 'Active', '0'),
(396, 'Branding', 6, '', 'Active', '0'),
(397, 'Call Centers / Telemarket', 6, '', 'Active', '0'),
(398, 'Campaigns', 6, '', 'Active', '0'),
(399, 'Communications', 6, '', 'Active', '0'),
(400, 'Concepts / Creative Direc', 6, '', 'Active', '0'),
(401, 'Content / Copywriting', 6, '', 'Active', '0'),
(402, 'Customer Relations', 6, '', 'Active', '0'),
(403, 'General Marketing', 6, '', 'Active', '0'),
(404, 'General Sales', 6, '', 'Active', '0'),
(405, 'Industry Specific Experti', 6, '', 'Active', '0'),
(406, 'Lead Generation', 6, '', 'Active', '0'),
(407, 'Management', 6, '', 'Active', '0'),
(408, 'Public Relations (PR)', 6, '', 'Active', '0'),
(409, 'Web / Digital Marketing', 6, '', 'Active', '0'),
(410, 'Architecture', 7, '', 'Active', '0'),
(411, 'CAD / 2D / 3D / Technical', 7, '', 'Active', '0'),
(412, 'Engineering', 7, '', 'Active', '0'),
(413, 'Math / Science / Algorith', 7, '', 'Active', '0'),
(414, 'Civil', 8, '', 'Active', '0'),
(415, 'Contracts / Agreements / ', 8, '', 'Active', '0'),
(416, 'Criminal', 8, '', 'Active', '0'),
(417, 'Employment / Business', 8, '', 'Active', '0'),
(418, 'Energy', 8, '', 'Active', '0'),
(419, 'Family', 8, '', 'Active', '0'),
(420, 'General / Other Law', 8, '', 'Active', '0'),
(421, 'Health & Medical', 8, '', 'Active', '0'),
(422, 'Immigration & Internation', 8, '', 'Active', '0'),
(423, 'Insurance', 8, '', 'Active', '0'),
(424, 'Intellectual Property', 8, '', 'Active', '0'),
(425, 'Legal Assistance', 8, '', 'Active', '0'),
(426, 'Mediation / Negotiation', 8, '', 'Active', '0'),
(427, 'Real Estate Law', 8, '', 'Active', '0'),
(428, 'Tax / Estates / Financial', 8, '', 'Active', '0'),
(429, 'Others', 9, '', 'Active', '0');

-- --------------------------------------------------------

--
-- Table structure for table `disputes`
--

CREATE TABLE `disputes` (
  `dsipute_id` int(11) NOT NULL,
  `email` text NOT NULL,
  `user_type` enum('Buyer','Freelancer') NOT NULL,
  `reason` text NOT NULL,
  `subject` text NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL,
  `is_resolved` enum('no','yes') NOT NULL,
  `is_paid` enum('Yes','No') NOT NULL DEFAULT 'No',
  `remaining_time` varchar(200) DEFAULT NULL,
  `u_id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `service_p_id` int(11) DEFAULT NULL,
  `type` enum('job','service') NOT NULL,
  `msg_id` int(11) NOT NULL,
  `winner_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `disputes_files`
--

CREATE TABLE `disputes_files` (
  `dispute_detail_id` int(11) NOT NULL,
  `dsipute_id` int(11) NOT NULL,
  `file` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doc_recived`
--

CREATE TABLE `doc_recived` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `id_document` text NOT NULL,
  `status` enum('Pending','Approved','Not Approved','') NOT NULL,
  `bill_document` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doc_recived`
--

INSERT INTO `doc_recived` (`id`, `u_id`, `id_document`, `status`, `bill_document`) VALUES
(12, 143, 'uploads/9ae4264dc66aad37cc0fd37ba19acecb3.png', 'Approved', 'uploads/f1f82cae1b52f8a0f64e840160db06ca3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE `general` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general`
--

INSERT INTO `general` (`id`, `name`, `price`) VALUES
(1, 'NDA', '20'),
(2, 'Sealed', '20'),
(3, 'Featured', '20'),
(5, 'Highly Paid', '30'),
(6, 'Urgent', '30'),
(10, 'Feature Profile', '1'),
(11, 'Credit Price', '1'),
(12, 'Feature Proposal', '10'),
(13, 'Disputenotification', '41'),
(14, 'Feature_service', '15'),
(15, 'dispute_fee', '15');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `job_title` text NOT NULL,
  `job_slug` text NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat` int(11) NOT NULL,
  `company_details` text NOT NULL,
  `job_details` text NOT NULL,
  `job_location` enum('Remote','Onsite') NOT NULL DEFAULT 'Remote',
  `job_level` text NOT NULL,
  `job_type` text NOT NULL COMMENT 'Fixed,Hourlie',
  `budget` text NOT NULL,
  `date` datetime NOT NULL,
  `job_awarded_to` int(11) NOT NULL,
  `pt_assurance` text DEFAULT NULL,
  `percentage_deduction` text DEFAULT NULL,
  `no_of_penalty_day` int(11) DEFAULT 0,
  `extended_pt_days` text NOT NULL,
  `privilidge_status` enum('Approved','Declined','Pending','Unpaid') NOT NULL DEFAULT 'Pending',
  `job_status` enum('Ongoing','Completed','Refund') NOT NULL DEFAULT 'Ongoing',
  `is_public` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `agree_term` enum('No','Yes') NOT NULL,
  `issue_status` enum('Normal','Open','Close') NOT NULL DEFAULT 'Normal',
  `total_time_worked` text NOT NULL,
  `is_invite` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `u_id`, `job_title`, `job_slug`, `cat_id`, `sub_cat`, `company_details`, `job_details`, `job_location`, `job_level`, `job_type`, `budget`, `date`, `job_awarded_to`, `pt_assurance`, `percentage_deduction`, `no_of_penalty_day`, `extended_pt_days`, `privilidge_status`, `job_status`, `is_public`, `agree_term`, `issue_status`, `total_time_worked`, `is_invite`) VALUES
(33, 140, 'Front End Web Developer', 'front-end-web-developer33', 1, 314, '', 'Front End Web Developer for my website required', 'Onsite', '', 'Fixed', '1', '2021-05-01 11:26:53', 158, NULL, NULL, 0, '', 'Approved', 'Completed', 'Yes', 'No', 'Normal', '', 'No'),
(34, 140, 'Front End Web Developer', 'front-end-web-developer34', 1, 314, '', '1', 'Onsite', '', 'Fixed', '1', '2021-05-03 07:42:00', 158, NULL, NULL, 0, '', 'Approved', 'Ongoing', 'Yes', 'No', 'Normal', '', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `jobs_msgs`
--

CREATE TABLE `jobs_msgs` (
  `msg_id` int(11) NOT NULL,
  `recv_id` int(11) NOT NULL,
  `send_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `job_id` text DEFAULT NULL,
  `msg_status` enum('Job','Inbox','Service') NOT NULL,
  `custom_status` text NOT NULL COMMENT 'Proposal,Invoice,Deposit,Refund,Time-Extension,Late,Penalty',
  `custom_status_extent` enum('0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19') DEFAULT '0' COMMENT '0=Normal,1=Proposal accepted,2=proposal rejected,3=proposal cancel,4=invoice normal,5=Invoice accepted,6=invoice rejected,7=invoice cancelled,8=Deposit Normal,9=Deposit rejected,10=Deposit cancelled,11=Deposit accepted,12=Refund normal.13=Refund accepted,14=refund rejected,15=refund cancelled,16=time extension,17=extension accept,18=extension reject,19=extension withdraw',
  `invoice_id` text NOT NULL,
  `proposal_budget` text NOT NULL,
  `proposal_deposit` text NOT NULL,
  `proposal_no` text DEFAULT NULL,
  `proposal_description` text NOT NULL,
  `earn_amt` text NOT NULL COMMENT 'after deduction',
  `service_id` text DEFAULT NULL,
  `service_p_id` text DEFAULT NULL,
  `invc_amt` text NOT NULL,
  `invc_description` text NOT NULL,
  `service_requiremnt` text DEFAULT NULL,
  `is_featured` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=Yes,1=No',
  `is_buyer_rated` enum('Yes','No') NOT NULL DEFAULT 'No',
  `is_freelancer_rated` enum('Yes','No') NOT NULL DEFAULT 'No',
  `tip_amt` float NOT NULL,
  `deposit_amt` float NOT NULL,
  `refund_amt` text NOT NULL,
  `time_extension_rsn` text NOT NULL,
  `extension_days` int(11) NOT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `seen_date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `extension_aceptance_date` datetime NOT NULL,
  `proposal_acptnc_date` datetime NOT NULL,
  `marked_as_complete` varchar(50) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs_msgs`
--

INSERT INTO `jobs_msgs` (`msg_id`, `recv_id`, `send_id`, `content`, `date`, `job_id`, `msg_status`, `custom_status`, `custom_status_extent`, `invoice_id`, `proposal_budget`, `proposal_deposit`, `proposal_no`, `proposal_description`, `earn_amt`, `service_id`, `service_p_id`, `invc_amt`, `invc_description`, `service_requiremnt`, `is_featured`, `is_buyer_rated`, `is_freelancer_rated`, `tip_amt`, `deposit_amt`, `refund_amt`, `time_extension_rsn`, `extension_days`, `is_seen`, `seen_date_time`, `extension_aceptance_date`, `proposal_acptnc_date`, `marked_as_complete`) VALUES
(59, 140, 158, 'www', '2021-05-01 11:29:46', '33', 'Job', 'Proposal', '1', '', '1', '1', '158-1619868586-59', 'Wordpress', '1', NULL, NULL, '', '', NULL, '1', 'No', 'No', 0, 0, '', '', 0, 1, '2021-05-01 15:30:31', '0000-00-00 00:00:00', '2021-05-01 12:04:22', 'no'),
(60, 158, 140, 'www', '2021-05-01 12:04:34', '33', 'Job', '', '0', '', '', '', NULL, '', '', NULL, NULL, '', '', NULL, '1', 'No', 'No', 0, 0, '', '', 0, 1, '2021-05-01 16:04:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no'),
(61, 140, 158, 'www', '2021-05-01 12:05:25', '33', 'Job', 'Invoice', '5', '158-1619870725-61', '', '', NULL, '', '', NULL, NULL, '1.00', 'www', NULL, '1', 'Yes', 'Yes', 0, 0, '', '', 0, 1, '2021-05-01 16:06:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'yes'),
(62, 140, 158, '1', '2021-05-03 07:44:18', '34', 'Job', 'Proposal', '1', '', '1', '1', '158-1620027858-62', '10', '1', NULL, NULL, '', '', NULL, '1', 'No', 'No', 0, 0, '', '', 0, 1, '2021-05-03 11:44:40', '0000-00-00 00:00:00', '2021-05-03 13:19:01', 'no'),
(63, 140, 156, 'Hello, Client.\r\nHow are you?\r\nI am a senior frontend developer.\r\nSo I think I can complete your task perfectly\r\nPlease contact me\r\nThank you', '2021-05-03 10:31:28', '34', 'Inbox', 'Proposal', '2', '', '100', '', '156-1620037888-63', '', '0', NULL, NULL, '', '', NULL, '1', 'No', 'No', 0, 0, '', '', 0, 1, '2021-05-03 17:15:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no'),
(64, 156, 140, 'Hi Li, Thank you for your message. This was Chris just doing a test for the site so apologies on a any confusion, we were just final testing one of the payment methods. All tests are now complete and from now on all roles will be 100% genuine. Sorry for any confusion!', '2021-05-03 13:17:55', '34', 'Inbox', '', '0', '', '', '', NULL, '', '', NULL, NULL, '', '', NULL, '1', 'No', 'No', 0, 0, '', '', 0, 1, '2021-05-03 17:18:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no'),
(65, 140, 156, 'ok', '2021-05-04 11:35:31', '34', 'Job', '', '0', '', '', '', NULL, '', '', NULL, NULL, '', '', NULL, '1', 'No', 'No', 0, 0, '', '', 0, 0, '2021-05-04 11:35:31', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `jobs_type`
--

CREATE TABLE `jobs_type` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `type` text NOT NULL,
  `is_paid` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs_wishlist`
--

CREATE TABLE `jobs_wishlist` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_images`
--

CREATE TABLE `job_images` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `images` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_images`
--

INSERT INTO `job_images` (`id`, `job_id`, `images`) VALUES
(1, 1, 'uploads/70696934_113474223370118_4938741571790045184_n4.jpg'),
(2, 1, 'uploads/freelancer1.jfif'),
(3, 22, 'uploads/Ossie_Ardiles.jpeg'),
(4, 23, 'uploads/Ossie_Ardiles1.jpeg'),
(5, 24, 'uploads/Ossie_Ardiles2.jpeg'),
(6, 25, 'uploads/Ossie_Ardiles3.jpeg'),
(7, 26, 'uploads/Ossie_Ardiles4.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `job_invites`
--

CREATE TABLE `job_invites` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `noti_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `main_menu`
--

CREATE TABLE `main_menu` (
  `id` int(2) NOT NULL,
  `pagename` varchar(25) NOT NULL,
  `icon` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_menu`
--

INSERT INTO `main_menu` (`id`, `pagename`, `icon`) VALUES
(1, 'Dashboard', 'entypo-gauge'),
(2, 'General', 'glyphicon glyphicon-cog'),
(3, 'Management', 'glyphicon glyphicon-cog'),
(4, 'Payments', 'glyphicon glyphicon-cog'),
(5, 'Settings', 'glyphicon glyphicon-cog'),
(6, 'Dispute', 'glyphicon glyphicon-cog');

-- --------------------------------------------------------

--
-- Table structure for table `msgs_files`
--

CREATE TABLE `msgs_files` (
  `id` int(11) NOT NULL,
  `msg_id` int(11) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `noti_id` int(11) NOT NULL,
  `notification` text NOT NULL,
  `noti_date` datetime NOT NULL,
  `noti_recvr_id` int(11) NOT NULL,
  `noti_sender_id` int(11) NOT NULL,
  `is_read` enum('Yes','No') NOT NULL DEFAULT 'No',
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`noti_id`, `notification`, `noti_date`, `noti_recvr_id`, `noti_sender_id`, `is_read`, `link`) VALUES
(214, 'Your documents are approved.', '2021-04-28 06:17:17', 143, 0, 'No', 'https://gigeconome.com/Payment'),
(215, 'Job is awaiting admin approval', '2021-05-01 11:26:53', 140, 0, 'No', 'javascript:void(0)'),
(216, 'Congratulations! Your job is approved by Gigeconome.', '2021-05-01 11:29:12', 140, 0, 'No', 'https://gigeconome.com/Jobs'),
(217, 'You have received a new proposal on your job.', '2021-05-01 16:29:46', 140, 158, 'Yes', 'inbox/viewproposal/33'),
(218, 'Client has accepted your proposal.', '2021-05-01 12:04:22', 158, 140, 'Yes', 'Chat/index/hello/front-end-web-developer33'),
(219, 'You have received a new Invoice on your job.', '2021-05-01 12:05:25', 140, 158, 'No', 'Chat/index/brewerspurs/front-end-web-developer33'),
(220, 'Cleaner Wrasse has accepted your invoice.', '2021-05-01 12:06:01', 158, 140, 'No', 'Chat/index/hello/front-end-web-developer33'),
(221, 'Job is awaiting admin approval', '2021-05-03 07:42:00', 140, 0, 'Yes', 'javascript:void(0)'),
(222, 'Congratulations! Your job is approved by Gigeconome.', '2021-05-03 07:43:01', 140, 0, 'No', 'https://gigeconome.com/Jobs'),
(223, 'You have received a new proposal on your job.', '2021-05-03 12:44:18', 140, 158, 'Yes', 'inbox/viewproposal/34'),
(224, 'You have received a new proposal on your job.', '2021-05-03 15:31:28', 140, 156, 'Yes', 'inbox/viewproposal/34'),
(225, 'Cleaner Wrasse has rejected your proposal.', '2021-05-03 13:18:04', 156, 140, 'Yes', 'Jobdetails/index/front-end-web-developer34'),
(226, 'Client has accepted your proposal.', '2021-05-03 13:19:01', 158, 140, 'No', 'Chat/index/hello/front-end-web-developer34');

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateway`
--

CREATE TABLE `payment_gateway` (
  `id` int(11) NOT NULL,
  `Name` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_gateway`
--

INSERT INTO `payment_gateway` (`id`, `Name`) VALUES
(1, 'Payoneer'),
(2, 'Stripe'),
(3, 'Paypal');

-- --------------------------------------------------------

--
-- Table structure for table `profile_featured`
--

CREATE TABLE `profile_featured` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `proposal_credits`
--

CREATE TABLE `proposal_credits` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `credits` int(11) NOT NULL,
  `date` date NOT NULL,
  `is_paid` enum('Yes','No') NOT NULL DEFAULT 'No',
  `used` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=Normal,1=Purcahsed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proposal_credits`
--

INSERT INTO `proposal_credits` (`id`, `u_id`, `credits`, `date`, `is_paid`, `used`, `status`) VALUES
(31, 141, 10, '2021-04-23', 'No', 10, '0'),
(32, 142, 10, '2021-04-23', 'No', 0, '0'),
(33, 143, 10, '2021-04-28', 'No', 0, '0'),
(34, 145, 10, '2021-04-28', 'No', 0, '0'),
(35, 146, 10, '2021-04-29', 'No', 10, '0'),
(36, 147, 10, '2021-04-30', 'No', 0, '0'),
(37, 148, 10, '2021-04-30', 'No', 10, '0'),
(38, 149, 10, '2021-04-30', 'No', 10, '0'),
(39, 150, 10, '2021-04-30', 'No', 0, '0'),
(40, 151, 10, '2021-04-30', 'No', 10, '0'),
(41, 152, 10, '2021-04-30', 'No', 0, '0'),
(42, 153, 10, '2021-04-30', 'No', 0, '0'),
(43, 155, 10, '2021-04-30', 'No', 10, '0'),
(44, 156, 10, '2021-04-30', 'No', 10, '0'),
(45, 146, 10, '2021-05-01', 'No', 0, '0'),
(46, 157, 10, '2021-05-01', 'No', 0, '0'),
(47, 158, 10, '2021-05-01', 'No', 0, '0'),
(48, 159, 10, '2021-05-02', 'No', 0, '0'),
(49, 161, 10, '2021-05-03', 'No', 0, '0'),
(50, 162, 10, '2021-05-03', 'No', 0, '0'),
(51, 161, 2, '2021-05-03', 'Yes', 0, ''),
(52, 155, 10, '2021-05-03', 'No', 0, '0'),
(53, 149, 10, '2021-05-03', 'No', 0, '0'),
(54, 156, 10, '2021-05-03', 'No', 0, '0'),
(55, 163, 10, '2021-05-05', 'No', 0, '0'),
(56, 141, 10, '2021-05-06', 'No', 0, '0'),
(57, 164, 10, '2021-05-08', 'No', 0, '0'),
(58, 165, 10, '2021-05-09', 'No', 0, '0'),
(59, 166, 10, '2021-05-09', 'No', 0, '0'),
(60, 151, 10, '2021-05-10', 'No', 0, '0'),
(61, 167, 10, '2021-05-11', 'No', 0, '0'),
(62, 168, 10, '2021-05-13', 'No', 0, '0'),
(63, 148, 10, '2021-05-15', 'No', 0, '0'),
(64, 169, 10, '2021-05-15', 'No', 0, '0'),
(65, 170, 10, '2021-05-15', 'No', 0, '0'),
(66, 171, 10, '2021-05-17', 'No', 0, '0'),
(67, 172, 10, '2021-05-19', 'No', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `user_type` text NOT NULL,
  `subject` text NOT NULL,
  `description` text NOT NULL,
  `query_question_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `query_status` varchar(50) NOT NULL DEFAULT 'open',
  `datetime_query` timestamp NOT NULL DEFAULT current_timestamp(),
  `ticket_id` text DEFAULT NULL,
  `is_user_read` varchar(50) NOT NULL,
  `is_admin_read` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `query_answer`
--

CREATE TABLE `query_answer` (
  `query_ans_id` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `recv_id` int(11) NOT NULL,
  `send_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `query_ans_attachments`
--

CREATE TABLE `query_ans_attachments` (
  `attach_id` int(11) NOT NULL,
  `ans_id` int(11) NOT NULL,
  `attachment_name` varchar(200) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `query_attachments`
--

CREATE TABLE `query_attachments` (
  `id` int(11) NOT NULL,
  `query_id` int(11) DEFAULT NULL,
  `attachments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `query_questions`
--

CREATE TABLE `query_questions` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `query_questions`
--

INSERT INTO `query_questions` (`id`, `question`) VALUES
(1, 'Account Activation'),
(2, 'Profile (Feature, Edit)'),
(3, 'Payment (Refund, Deposit, Withdrawal)'),
(4, 'Dispute'),
(5, 'Project (Post, Feature, Edit)'),
(6, 'Proposal (Accept, Reject)'),
(7, 'Invite Freelancer'),
(8, 'Service (Post, Feature, Edit, Buy)'),
(9, 'Project Timeline Assurance (ETR, Penalty)'),
(10, 'Extension Time Request (Accept, Reject)'),
(11, 'Customer Support'),
(12, 'Enhancement Request');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image` text NOT NULL,
  `reviews` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`id`, `name`, `image`, `reviews`) VALUES
(1, 'Bronze', 'assets/All_Icons/Badge-01.png', 30),
(2, 'Silver', 'assets/All_Icons/Badge-02.png', 100),
(3, 'Gold', 'assets/All_Icons/Badge-03.png', 10),
(4, 'Platinum', 'assets/All_Icons/Badge-04.png', 20),
(5, 'Diamond', 'assets/All_Icons/Badge-05.png', 30);

-- --------------------------------------------------------

--
-- Table structure for table `recommend_freelancers`
--

CREATE TABLE `recommend_freelancers` (
  `recommend_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recommend_freelancers`
--

INSERT INTO `recommend_freelancers` (`recommend_id`, `u_id`) VALUES
(11, 143),
(12, 141),
(13, 142);

-- --------------------------------------------------------

--
-- Table structure for table `recommend_offers`
--

CREATE TABLE `recommend_offers` (
  `recommend_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recommend_offers`
--

INSERT INTO `recommend_offers` (`recommend_id`, `service_id`) VALUES
(4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `security_questions`
--

CREATE TABLE `security_questions` (
  `q_id` int(11) NOT NULL,
  `question` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `security_questions`
--

INSERT INTO `security_questions` (`q_id`, `question`) VALUES
(1, 'What is the name of your hometown?'),
(2, 'What is the name of your first car Brand?'),
(3, 'What is the name of your favourite teacher?'),
(4, 'What is the name of your Grandma?'),
(5, 'Where were you Born?'),
(6, 'Year when your father was born?');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_slug` varchar(200) NOT NULL,
  `title` text NOT NULL,
  `amount` text NOT NULL,
  `description` text NOT NULL,
  `delivery` int(3) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `tags` text NOT NULL,
  `u_id` int(11) NOT NULL,
  `is_service_featured` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=not featured,1=featured'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_slug`, `title`, `amount`, `description`, `delivery`, `cat_id`, `tags`, `u_id`, `is_service_featured`) VALUES
(9, 'design-responsive-seo-friendly-fast-loading-wordpress-website9', 'Design Responsive, SEO friendly & Fast Loading WordPress website', '220', 'What you get with this Offer\r\n? 100% money back guarantee if you are not satisfied with my Services - no questions asked\r\n? 100% Client satisfaction\r\n? Super-fast & Friendly support that will be amazed you like others.\r\n? Quality Services\r\n? Service on Best Price\r\n? Unlimited Support for Our Client\r\nHello there, hope you are doing good!\r\n\r\nI\'m here to offer you the best of quality responsive, SEO friendly website based on a WordPress premium theme \r\nand plugins at a very affordable cost.\r\nIn just 5 days you are going to get a complete WordPress website ready to launch.\r\n\r\n??? What’s I will Provide ???\r\n\r\nThis is what you get in our web design/web development offer :\r\n\r\n1) Web-based administration (CMS) for easy real-time updates\r\n2) Social Media Integration (Facebook, Twitter, etc.).\r\n3) Design of your Wordpress Website (including any amendments)\r\n4) Your Content added to the Website (you need to provide this to me)\r\n5) All of the Pages(up to 5 ) that you require\r\n6) 100 % Responsive Website on All Devices\r\n7) Newsletter Subscription.\r\n8) Free Advice on how to update the Website.\r\n9) Rotating images slider/banner on the Home page.\r\n10)Your work/project images or video/audio gallery page with play feature and description.\r\n11) Contact us page with contact form and google map displaying your address.\r\n12) SEO plugin (Yoast SEO)\r\n13) Make it fast loading and make it hack proof.\r\n\r\n\r\nOr\r\n\r\nLet us know what all 5 pages you want(for extra pages please buy ADD-ON), we will make them as per your \r\nneeds.\r\n\r\n\r\nMy ethos is to put my customers first, and you can be assured of my utmost commitment to your work at all \r\ntimes.\r\n\r\n??? Guarantee ???\r\n? Fully secured and hack-proof website\r\n? Fast loading pages for better conversion and navigability\r\n? Fully responsive - mobile, iPad, laptop, or desktop ready\r\n\r\nSo, what are you waiting for?\r\n\r\nContact me NOW, with your details. I will respond you in A MINUTE!', 3, 1, 'Wordpress,PHP,CSS,Shopify,Website', 143, '0'),
(10, 'graphic-web-logo-design10', 'Graphic, Web & Logo Design', '40', 'Graphic, Web & Logo Design', 1, 3, 'Web Design,Logo Design,Graphic Design', 142, '0'),
(11, 'write-webpages-or-content-per-hour11', 'Write webpages or content (per hour)', '20', 'write webpages or content (per hour)', 1, 2, 'Writing,Content,Articles', 141, '0'),
(12, 'make-website-easily12', 'make website easily', '12', 'I can make website easily', 3, 2, 'html,css', 145, '0'),
(13, 'write-web-content13', 'write Web content ', '80', 'I will write your web content in a perfect way. writing web copy can be a tough task specially when you do not have \r\nample knowledge on how optimize the content for SEO, grab the readers\' attention and make it a call for an action... \r\nhit me up and you will have a stupendous web copy/website copy/website content. ', 4, 2, 'web content,website content,copywriting,content writing,website copy', 146, '0'),
(14, 'install-ssl-certficiate-for-your-web-site14', 'install SSL certficiate for your web site', '20', 'If you own a web site, securing it with SSL (https) is very important for privacy of your users and SEO ranking. \r\nGoogle recetly announced sites having SSL will have higher priority on search ranking. \r\n\r\nI can install SSL certficate for your web site and make it secure.\r\n', 1, 1, 'ssl, https, ssl certificate,website security', 148, '0'),
(15, 'web-and-app-design-and-development15', 'web and app design and development', '100', 'I will provide web and mobile app development work', 1, 1, 'web development,web design,app development,app design,web scrapping', 156, '0'),
(16, 'write-a-unique-article-for-your-website-in-24-hrs16', 'Write a Unique Article for your website in 24 Hrs.', '20', 'Do you need somebody to write for your blog? If so, you are in the right place! I will write a unique blog post on the topic of \r\nyour choice after thorough research in 24hours.\r\n\r\nTo help your articles reach the target audience, I am up to date with the best SEO practices and will utilize them in your \r\npost. \r\n\r\nGuarantee.\r\n•	Well researched and detailed content\r\n•	500 words\r\n•	One focus word\r\n•	100% original content that will pass copy-scape\r\n•	Conversational and engaging content\r\n•	100% grammatically correct\r\n•	Two revisions at no additional cost\r\nCustomer satisfaction is my top priority. Feel free to message me, and let\'s talk.\r\n', 1, 2, 'content writing,Blog posts,SEO optimized articles,Article writing,Academic writing', 164, '0'),
(17, 'provide-exemplary-customer-service-for-your-clients17', 'Provide Exemplary Customer Service for your clients', '20', 'Are you looking for a Customer Service person to Wow your customers? Look no further.\r\n\r\nI have excellent interpersonal skills, am keen on details, competent in working with timelines, and work \r\nunder any pressure while professionally handling customer issues through calls, email, and chat support \r\nwith an aim to retain them. \r\n \r\nOffer.\r\n•	Professional Service\r\n•	Quality Assurance standards\r\n•	Accuracy & Satisfaction Guarantee\r\n•	Customer confidentiality\r\n•	Delivered within Timelines\r\n\r\nServices \r\n•	Customer Service\r\n•	Basic Troubleshooting Support\r\n•	Email Handling\r\n•	Live chat handling\r\n•	Data Entry\r\n•	Account Support\r\n\r\nQuality of good work is my priority! Feel free to message me, and let’s talk.\r\n', 1, 4, 'Customer Service,Technical Support,Email Handling,Call Handling,Chat Handling', 164, '0'),
(18, 'i-can-redraw-vector-image-logo-in-no-time18', 'vectorizing an image or logo in no time', '30', 'Hello.\r\nWelcome to our service. Are you looking for vectorizing logos / images / graphics to get\r\nhigh-resolution vector files so you can use the web or print at larger sizes? Or would you\r\nlike to change colors or modify / customize your existing logo or tagline?\r\nYou are at the right place!\r\ni am a professional graphic designer having more than 6 years experience in vectorization.\r\nBasically, we are experts at redrawing, vector tracing, editing logos, and converting logos\r\nand images to vectors.\r\n\r\nWhat makes my services different from others are:\r\n? 100% original design\r\n? High Quality\r\n? Unlimited revisions\r\n?All types of vector source files - AI EPS PDF PNG JPEG (On request)\r\n? Money Back Guarantee if You Are Not Satisfied\r\n? Friendly Customer Service\r\n?On Time Delivery\r\n\r\nI will be more than happy to help you and look forward to building a great business\r\nrelationship.\r\nplease ORDER NOW!\r\n\r\nNOTE: Please contact me before ordering if you have special requests.\r\nThank you.', 1, 3, 'logo,vector,image,vector tracing,redraw', 172, '0');

-- --------------------------------------------------------

--
-- Table structure for table `services_adons`
--

CREATE TABLE `services_adons` (
  `adonid` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `amount` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services_adons`
--

INSERT INTO `services_adons` (`adonid`, `service_id`, `title`, `amount`) VALUES
(19, 9, 'design every extra page design on', '20'),
(20, 10, '', ''),
(22, 11, 'check the website content once live', '10'),
(23, 12, 'website', '10'),
(24, 13, 'perform the service in two days ', '10'),
(25, 14, '', ''),
(26, 15, '', ''),
(28, 16, '', ''),
(29, 17, '', ''),
(32, 18, 'I can vectorize 2 images or logos in no time', '50');

-- --------------------------------------------------------

--
-- Table structure for table `services_featured`
--

CREATE TABLE `services_featured` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services_msgs`
--

CREATE TABLE `services_msgs` (
  `msg_id` int(11) NOT NULL,
  `recv_id` int(11) NOT NULL,
  `send_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  `job_id` int(11) NOT NULL,
  `msg_status` enum('Job','Inbox','Service') NOT NULL,
  `custom_status` text NOT NULL COMMENT 'Proposal,Invoice,Deposit,Refund,Service-Purchased,Time-Extension,Late,Penality',
  `custom_status_extent` enum('0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20') DEFAULT '0' COMMENT '0=Normal,1=Proposal accepted,2=proposal rejected,3=proposal cancel,4=invoice normal,5=Invoice accepted,6=invoice rejected,7=invoice cancelled,8=Deposit Normal,9=Deposit rejected,10=Deposit cancelled,11=Deposit accepted,12=Refund normal.13=Refund accepted,14=refund rejected,15=refund cancelled,16=time extension,17=extension accept,18=extension reject,19=extension withdraw,20=Service_purchased',
  `invoice_id` text NOT NULL,
  `proposal_budget` text NOT NULL,
  `proposal_deposit` text NOT NULL,
  `proposal_no` text DEFAULT NULL,
  `proposal_description` text NOT NULL,
  `earn_amt` text NOT NULL COMMENT 'after deduction',
  `service_id` text DEFAULT NULL,
  `service_p_id` text DEFAULT NULL,
  `invc_amt` text NOT NULL,
  `invc_description` text NOT NULL,
  `service_requiremnt` text DEFAULT NULL,
  `is_featured` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=Yes,1=No',
  `is_buyer_rated` enum('Yes','No') NOT NULL DEFAULT 'No',
  `is_freelancer_rated` enum('Yes','No') NOT NULL DEFAULT 'No',
  `tip_amt` float NOT NULL,
  `deposit_amt` float NOT NULL,
  `refund_amt` text NOT NULL,
  `time_extension_rsn` text NOT NULL,
  `extension_days` int(11) NOT NULL,
  `extension_aceptance_date` date NOT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `seen_date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `proposal_acptnc_date` datetime NOT NULL,
  `marked_as_complete` varchar(50) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services_purchased`
--

CREATE TABLE `services_purchased` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `service_owner_id` int(11) NOT NULL,
  `who_purchased` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('Ongoing','Completed','Cancel') NOT NULL DEFAULT 'Ongoing',
  `adons` text NOT NULL,
  `is_paid` enum('Yes','No') NOT NULL DEFAULT 'No',
  `content` text DEFAULT NULL,
  `purchase_amount` double NOT NULL,
  `issue_status` enum('Normal','Open','Close') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services_purchased`
--

INSERT INTO `services_purchased` (`id`, `service_id`, `service_owner_id`, `who_purchased`, `date`, `status`, `adons`, `is_paid`, `content`, `purchase_amount`, `issue_status`) VALUES
(5, 9, 143, 162, '2021-05-03 07:53:17', 'Ongoing', '19', 'No', 'helo details are here', 231, 'Normal'),
(6, 9, 143, 162, '2021-05-03 08:01:11', 'Ongoing', '19', 'No', 'dddd', 252, 'Normal'),
(7, 9, 143, 162, '2021-05-03 08:01:52', 'Ongoing', '19', 'No', 'sd', 252, 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `services_views`
--

CREATE TABLE `services_views` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `service_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services_views`
--

INSERT INTO `services_views` (`id`, `date`, `service_id`, `u_id`) VALUES
(142, '2021-04-28 11:02:51', 9, 143),
(143, '2021-04-28 12:43:00', 10, 142),
(144, '2021-04-28 12:50:45', 11, 141),
(145, '2021-04-28 15:52:16', 12, 145),
(146, '2021-04-29 10:56:34', 9, 1),
(147, '2021-04-29 11:04:51', 12, 1),
(148, '2021-04-29 21:49:24', 13, 146),
(149, '2021-04-30 13:21:52', 14, 148),
(150, '2021-04-30 17:19:32', 14, 154),
(151, '2021-04-30 17:21:00', 10, 154),
(152, '2021-04-30 18:31:46', 11, 156),
(153, '2021-04-30 18:38:19', 15, 156),
(154, '2021-05-03 12:52:14', 9, 162),
(155, '2021-05-06 17:12:02', 10, 141),
(156, '2021-05-11 15:21:20', 16, 164),
(157, '2021-05-11 15:38:30', 17, 164),
(158, '2021-05-20 22:32:35', 10, 172),
(159, '2021-05-20 22:45:27', 15, 172),
(160, '2021-05-20 23:27:32', 18, 172),
(161, '2021-05-20 23:43:22', 9, 172);

-- --------------------------------------------------------

--
-- Table structure for table `services_wishlist`
--

CREATE TABLE `services_wishlist` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service_msgs_files`
--

CREATE TABLE `service_msgs_files` (
  `id` int(11) NOT NULL,
  `msg_id` int(11) NOT NULL,
  `file` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service_portfolio`
--

CREATE TABLE `service_portfolio` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_portfolio`
--

INSERT INTO `service_portfolio` (`id`, `service_id`, `image`) VALUES
(1, 1, 'uploads/70696934_113474223370118_4938741571790045184_n6.jpg'),
(2, 2, 'uploads/image_(3).png'),
(3, 3, 'uploads/1526116451G_1525359321964_(1).jpg'),
(4, 3, 'uploads/Rashid111.jpg'),
(5, 4, 'uploads/pngtree-summer-swimming-pool-banner-background-material-poolindoor-swimming-poolpondsummer-image_51326.jpg'),
(6, 5, 'uploads/download_(4).jpg'),
(7, 6, 'uploads/client3.jpg'),
(8, 6, 'uploads/freelancercover2.jpg'),
(9, 7, 'uploads/Game_of_Thrones.jpeg'),
(10, 1, 'uploads/1526116451G_1525359321964_(1)7.jpg'),
(11, 8, 'uploads/mssql-restore-backup.png'),
(12, 8, 'uploads/gigeconome.png'),
(13, 9, 'uploads/9ae4264dc66aad37cc0fd37ba19acecb2.png'),
(14, 9, 'uploads/9ed33ebcdef29c95ee6b89bbdc4ce7ba2.jpg'),
(15, 9, 'uploads/f1f82cae1b52f8a0f64e840160db06ca2.jpg'),
(16, 10, 'uploads/cat_des.jpg'),
(17, 11, 'uploads/Me_and_Cahill3.jpeg'),
(18, 12, 'uploads/screencapture-customer-sukhilogistics-orders-create-2021-04-23-17_44_49.png'),
(19, 13, 'uploads/Looking_for_Web_Content.png'),
(20, 14, 'uploads/SSL_INSTGALL.png'),
(21, 15, 'uploads/laptop_2.jpg'),
(22, 16, 'uploads/Blog_posts_writing.jpg'),
(23, 17, 'uploads/professional-customer-service-expert.jpg'),
(24, 18, 'uploads/vector.png');

-- --------------------------------------------------------

--
-- Table structure for table `service_rating`
--

CREATE TABLE `service_rating` (
  `rating_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `stars` int(2) NOT NULL,
  `comment` text NOT NULL,
  `service_purchase_id` int(11) NOT NULL,
  `who_rated` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `is_reply` enum('Yes','No') NOT NULL DEFAULT 'No',
  `reply_of` int(11) NOT NULL,
  `msg_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `tagline` text NOT NULL,
  `url` text NOT NULL,
  `sitemetadesc` text NOT NULL,
  `sitemetakeyword` text NOT NULL,
  `metautor` text NOT NULL,
  `email` text NOT NULL,
  `pass` text NOT NULL,
  `paypalclientid` text NOT NULL,
  `paypalsecret` text NOT NULL,
  `stripesecretkey` text NOT NULL,
  `stripepublishablekey` text NOT NULL,
  `googleanalytics` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `name`, `tagline`, `url`, `sitemetadesc`, `sitemetakeyword`, `metautor`, `email`, `pass`, `paypalclientid`, `paypalsecret`, `stripesecretkey`, `stripepublishablekey`, `googleanalytics`) VALUES
(1, 'GigeconoMe', 'Join and Grow With Us!', 'gigeconome.com', 'Find & Hire Talented Freelancers.', 'The Ultimate Freelance Marketplace!', 'Sanfof System Ltd.', 'sk_test_6oN0jtKTodXl8n4EF7gdxbFw', 'pk_test_UT2OSTSxep4ZWAyEZXElO5BV', 'AVyqLeVR8HUGf8VYkvIVxm1IB_DonJkaqomsnFO3z5p-WqfegX7Q9_kDSAcXYmsKnDnAGGjYC5jaC3G5', 'EJf34V7XQsuEYDQVfn1ZtxdTxVxTnAcrv5L8LzRAmTNtPuF03aZElzfl53RphEcaiD6pC8FSeCGqqviJ', 'sk_test_6oN0jtKTodXl8n4EF7gdxbFw', 'pk_test_UT2OSTSxep4ZWAyEZXElO5BV', '<script>\r\n  (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){\r\n  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),\r\n  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)\r\n  })(window,document,\'script\',\'https://www.google-analytics.com/analytics.js\',\'ga\');\r\n\r\n  ga(\'create\', \'UA-79656468-4\', \'auto\');\r\n  ga(\'send\', \'pageview\');\r\n\r\n</script>');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill_id` int(11) NOT NULL,
  `skill_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `skill_name`) VALUES
(1, ' .NET Core'),
(2, ' 4D'),
(3, ' Active Directory'),
(4, ' ADO.NET'),
(5, ' Adobe Air'),
(6, ' Adobe Captivate'),
(7, ' Adobe Dynamic Tag Management'),
(8, ' Adobe Freehand'),
(9, ' Adobe Illustrator'),
(10, ' Adobe Muse'),
(11, ' Adobe Pagemaker'),
(12, ' Adobe Premiere Pro'),
(13, ' Agile Development'),
(14, ' Agile Project Management'),
(15, ' AI/RPA development'),
(16, ' Airtable'),
(17, ' AJAX'),
(18, ' Alexa Modification'),
(19, ' Alibaba'),
(20, ' Alteryx'),
(21, ' Amazon App Development'),
(22, ' Amazon S3'),
(23, ' Amazon Web Services'),
(24, ' Amibroker Formula Language'),
(25, ' AMQP'),
(26, ' Analytics'),
(27, ' Anaplan'),
(28, ' Android Wear SDK'),
(29, ' Angular Material'),
(30, ' Angular.js'),
(31, ' Apache'),
(32, ' Apache Ant'),
(33, ' Apache Hadoop'),
(34, ' Apache Maven'),
(35, ' Apache Solr'),
(36, ' API'),
(37, ' App Developer'),
(38, ' Apple Safari'),
(39, ' Apple UIKit'),
(40, ' Apple Xcode'),
(41, ' Applescript'),
(42, ' Application Performance Monitoring'),
(43, ' Apttus'),
(44, ' ARCore'),
(45, ' Arena Simulation Programming'),
(46, ' Argus Monitoring Software'),
(47, ' Ariba'),
(48, ' ARKit'),
(49, ' Armadillo'),
(50, ' Articulate Storyline'),
(51, ' Artificial Intelligence'),
(52, ' AS400 & iSeries'),
(53, ' Asana'),
(54, ' ASM'),
(55, ' ASP'),
(56, ' ASP.NET'),
(57, ' ASP.NET MVC'),
(58, ' Assembla'),
(59, ' Assembly'),
(60, ' Asterisk PBX'),
(61, ' Atlassian Confluence'),
(62, ' Atlassian Jira'),
(63, ' Augmented Reality'),
(64, ' AutoHotkey'),
(65, ' Aws Lambda'),
(66, ' Azure'),
(67, ' backbone.js'),
(68, ' Backend Development'),
(69, ' Balsamiq'),
(70, ' Bash Scripting'),
(71, ' BeautifulSoup'),
(72, ' Big Data Sales'),
(73, ' BigCommerce'),
(74, ' Binary Analysis'),
(75, ' BIRT Development'),
(76, ' Bitcoin'),
(77, ' Biztalk'),
(78, ' Blender'),
(79, ' Blockchain'),
(80, ' Blog Install'),
(81, ' Bluetooth Low Energy (BLE)'),
(82, ' BMC Remedy'),
(83, ' Boonex Dolphin'),
(84, ' Boost'),
(85, ' Bower'),
(86, ' BSD'),
(87, ' Bubble Developer'),
(88, ' Business Catalyst'),
(89, ' Business Central'),
(90, ' Business Intelligence'),
(91, ' C Programming'),
(92, ' C# Programming'),
(93, ' C++ Programming'),
(94, ' CakePHP'),
(95, ' Call Control XML'),
(96, ' Camtasia'),
(97, ' Carthage'),
(98, ' CasperJS'),
(99, ' Caspio'),
(100, ' Cassandra'),
(101, ' CentOs'),
(102, ' Certified Information Systems Security Professional (CISSP)'),
(103, ' Charts'),
(104, ' Chef Configuration Management'),
(105, ' Chordiant'),
(106, ' Chrome OS'),
(107, ' Cinematography'),
(108, ' CircleCI'),
(109, ' Cisco'),
(110, ' CLIPS'),
(111, ' Clojure'),
(112, ' Cloud'),
(113, ' Cloud Computing'),
(114, ' Cloud Data'),
(115, ' Cloud Development'),
(116, ' Cloud Finance'),
(117, ' Cloud Networking'),
(118, ' Cloud Procurement'),
(119, ' Cloud Security'),
(120, ' CMS'),
(121, ' COBOL'),
(122, ' Cocoa'),
(123, ' Cocoa Touch'),
(124, ' CocoaPods'),
(125, ' Cocos2d'),
(126, ' Codeigniter'),
(127, ' Coding'),
(128, ' CoffeeScript'),
(129, ' Cognos'),
(130, ' Cold Fusion'),
(131, ' CompTIA'),
(132, ' Computer Graphics'),
(133, ' Computer Science'),
(134, ' Computer Security'),
(135, ' Computer Vision'),
(136, ' Copyright'),
(137, ' Corel Draw'),
(138, ' CRE Loaded'),
(139, ' CS-Cart'),
(140, ' CSS3'),
(141, ' CubeCart'),
(142, ' CUDA'),
(143, ' cURL'),
(144, ' CV Library'),
(145, ' cxf'),
(146, ' D3.js'),
(147, ' Dart'),
(148, ' Data Governance'),
(149, ' Data Integration'),
(150, ' Data Modernization'),
(151, ' Data Visualization'),
(152, ' Data Warehousing'),
(153, ' Database Administration'),
(154, ' Database Development'),
(155, ' Database Programming'),
(156, ' DataLife Engine'),
(157, ' Datatables'),
(158, ' DDS'),
(159, ' Debian'),
(160, ' Debugging'),
(161, ' Delphi'),
(162, ' Development Operations'),
(163, ' Digital Marketing'),
(164, ' Digital Signal Processing'),
(165, ' Django'),
(166, ' DNS'),
(167, ' Docker'),
(168, ' Documentation'),
(169, ' Dojo'),
(170, ' DOM'),
(171, ' DOS'),
(172, ' DotNetNuke'),
(173, ' Drawing'),
(174, ' Dropbox API'),
(175, ' Drupal'),
(176, ' Dthreejs'),
(177, ' Dynamic 365'),
(178, ' Dynamics'),
(179, ' Dynatrace Software Monitoring'),
(180, ' EC Pay Workday'),
(181, ' Eclipse'),
(182, ' ECMAScript'),
(183, ' eCommerce'),
(184, ' edX'),
(185, ' Elasticsearch'),
(186, ' eLearning'),
(187, ' Electronic Forms'),
(188, ' Elixir'),
(189, ' Email Developer'),
(190, ' Embedded Software'),
(191, ' Ember.js'),
(192, ' Enterprise Architecture'),
(193, ' Erlang'),
(194, ' ERP Software'),
(195, ' ES8 Javascript'),
(196, ' Ethereum'),
(197, ' ETL'),
(198, ' Express JS'),
(199, ' Expression Engine'),
(200, ' Ext JS'),
(201, ' F#'),
(202, ' Face Recognition'),
(203, ' Facebook API'),
(204, ' Facebook Pixel'),
(205, ' Facebook Product Catalog'),
(206, ' Facebook SDK'),
(207, ' Fastlane'),
(208, ' FileMaker'),
(209, ' Firefox'),
(210, ' Firmware'),
(211, ' FLANN'),
(212, ' Flask'),
(213, ' Flutter'),
(214, ' Fortran'),
(215, ' Forum Software'),
(216, ' Freelancer API'),
(217, ' FreeSwitch'),
(218, ' Frontend Development'),
(219, ' Full Stack Development'),
(220, ' Game Consoles'),
(221, ' Game Design'),
(222, ' Game Development'),
(223, ' GameSalad'),
(224, ' Gamification'),
(225, ' Genetic Algebra Modelling System'),
(226, ' Geographical Information System (GIS)'),
(227, ' GIMP'),
(228, ' Git'),
(229, ' GitHub'),
(230, ' GitLab'),
(231, ' Golang'),
(232, ' Google Analytics'),
(233, ' Google APIs'),
(234, ' Google App Engine'),
(235, ' Google Cardboard'),
(236, ' Google Chrome'),
(237, ' Google Cloud Platform'),
(238, ' Google Cloud Storage'),
(239, ' Google Docs'),
(240, ' Google Earth'),
(241, ' Google Firebase'),
(242, ' Google Maps API'),
(243, ' Google PageSpeed Insights'),
(244, ' Google Plus'),
(245, ' Google Sheets'),
(246, ' Google Tag Management'),
(247, ' Google Web Toolkit'),
(248, ' Google Webmaster Tools'),
(249, ' GoPro'),
(250, ' GPGPU'),
(251, ' Grails'),
(252, ' Graphics Programming'),
(253, ' Grease Monkey'),
(254, ' Growth Hacking'),
(255, ' Grunt'),
(256, ' GTK+'),
(257, ' Guidewire'),
(258, ' Hadoop'),
(259, ' Handlebars.js'),
(260, ' Haskell'),
(261, ' HBase'),
(262, ' Heroku'),
(263, ' Heron'),
(264, ' Hewlett Packard'),
(265, ' Highcharts'),
(266, ' Hive'),
(267, ' HomeKit'),
(268, ' HP Openview'),
(269, ' HP-UX'),
(270, ' HTC Vive'),
(271, ' HTML'),
(272, ' HTML5'),
(273, ' HTTP'),
(274, ' iBeacon'),
(275, ' IBM Bluemix'),
(276, ' IBM BPM'),
(277, ' IBM Tivoli'),
(278, ' IBM Tririga'),
(279, ' IBM Websphere Transformation Tool'),
(280, ' IIS'),
(281, ' iMacros'),
(282, ' Infor'),
(283, ' Informatica MDM'),
(284, ' Informatica Powercenter ETL'),
(285, ' Instagram'),
(286, ' Instagram API'),
(287, ' Internet Security'),
(288, ' Interspire'),
(289, ' Ionic Framework'),
(290, ' iOS Development'),
(291, ' IT Operating Model'),
(292, ' IT strategy'),
(293, ' IT Transformation'),
(294, ' ITIL'),
(295, ' J2EE'),
(296, ' Jabber'),
(297, ' Jasmine Javascript'),
(298, ' Java'),
(299, ' Java ME'),
(300, ' Java Spring'),
(301, ' Java Technical Architecture'),
(302, ' JavaFX'),
(303, ' Javascript'),
(304, ' Javascript ES6'),
(305, ' JD Edwards CNC'),
(306, ' Jenkins'),
(307, ' Jinja2'),
(308, ' Joomla'),
(309, ' jqGrid'),
(310, ' jQuery'),
(311, ' jQuery / Prototype'),
(312, ' JSON'),
(313, ' JSP'),
(314, ' Julia Development'),
(315, ' Julia Language'),
(316, ' JUnit'),
(317, ' Karma Javascript'),
(318, ' Kendo UI'),
(319, ' Keras'),
(320, ' Kinect'),
(321, ' KNIME'),
(322, ' Knockout.js'),
(323, ' Kubernetes'),
(324, ' LabVIEW'),
(325, ' Laravel'),
(326, ' Leap Motion SDK'),
(327, ' LearnDash'),
(328, ' Learning Management Solution (LMS) Consulting'),
(329, ' Learning Management Systems (LMS)'),
(330, ' LESS/Sass/SCSS'),
(331, ' LIBSVM'),
(332, ' Link Building'),
(333, ' Linkedin'),
(334, ' LINQ'),
(335, ' Linux'),
(336, ' Lisp'),
(337, ' LiveCode'),
(338, ' Local Area Networking'),
(339, ' Lotus Notes'),
(340, ' Lua'),
(341, ' Lucene'),
(342, ' Mac OS'),
(343, ' Magento'),
(344, ' Magento 2'),
(345, ' Magic Leap'),
(346, ' Managed Analytics'),
(347, ' Map Reduce'),
(348, ' MapKit'),
(349, ' MariaDB'),
(350, ' MEAN Stack'),
(351, ' Metatrader'),
(352, ' MeteorJS'),
(353, ' Microsoft'),
(354, ' Microsoft Access'),
(355, ' Microsoft Azure'),
(356, ' Microsoft Exchange'),
(357, ' Microsoft Expression'),
(358, ' Microsoft Hololens'),
(359, ' Microsoft Project'),
(360, ' Microsoft SQL Server'),
(361, ' Microsoft Visio'),
(362, ' Minitab'),
(363, ' MMORPG'),
(364, ' Mobile App Testing'),
(365, ' Mobile Development'),
(366, ' MODx'),
(367, ' MonetDB'),
(368, ' MongoDB'),
(369, ' Moodle'),
(370, ' Moz'),
(371, ' MQTT'),
(372, ' MuleSoft'),
(373, ' MVC'),
(374, ' MySpace'),
(375, ' MySQL'),
(376, ' NAV'),
(377, ' Netbeans'),
(378, ' NetSuite'),
(379, ' Network Administration'),
(380, ' Network Engineering'),
(381, ' Network Security'),
(382, ' Nginx'),
(383, ' NgRx'),
(384, ' Ning'),
(385, ' node.js'),
(386, ' NoSQL'),
(387, ' NoSQL Couch & Mongo'),
(388, ' NumPy'),
(389, ' OAuth'),
(390, ' Object Oriented Programming (OOP)'),
(391, ' Objective C'),
(392, ' OCR'),
(393, ' Oculus Mobile SDK'),
(394, ' Oculus Rift'),
(395, ' Odoo'),
(396, ' Office 365'),
(397, ' Offline Conversion Facebook API Integration'),
(398, ' Open Cart'),
(399, ' Open Journal Systems'),
(400, ' Open Source'),
(401, ' OpenBravo'),
(402, ' OpenCL'),
(403, ' OpenCV'),
(404, ' OpenGL'),
(405, ' OpenSceneGraph'),
(406, ' OpenSSL'),
(407, ' OpenStack'),
(408, ' OpenVMS'),
(409, ' OpenVPN'),
(410, ' OpenVZ'),
(411, ' Oracle'),
(412, ' Oracle Database'),
(413, ' Oracle EBS Tech Integration'),
(414, ' Oracle Hyperion'),
(415, ' Oracle OBIA'),
(416, ' Oracle OBIEE'),
(417, ' Oracle Primavera'),
(418, ' Oracle Retail'),
(419, ' OSCommerce'),
(420, ' Papiamento'),
(421, ' Parallax Scrolling'),
(422, ' Parallel Processing'),
(423, ' Parallels Automation'),
(424, ' Parallels Desktop'),
(425, ' Pascal'),
(426, ' Pattern Matching'),
(427, ' Payment Gateway Integration'),
(428, ' PayPal API'),
(429, ' Paytrace'),
(430, ' PC Programming'),
(431, ' PEGA PRPC'),
(432, ' PencilBlue CMS'),
(433, ' Penetration Testing'),
(434, ' Pentaho'),
(435, ' Perl'),
(436, ' PhoneGap'),
(437, ' Photoshop Coding'),
(438, ' PHP'),
(439, ' PHP Slim'),
(440, ' phpFox'),
(441, ' phpMyAdmin'),
(442, ' PhpNuke'),
(443, ' PICK Multivalue DB'),
(444, ' Pine Script'),
(445, ' Pinterest'),
(446, ' Plesk'),
(447, ' Plugin'),
(448, ' PostgreSQL'),
(449, ' PostgreSQL Programming'),
(450, ' PostreSQL'),
(451, ' Power BI'),
(452, ' Powershell'),
(453, ' Prestashop'),
(454, ' Programming'),
(455, ' Prolog'),
(456, ' Prometheus Monitoring'),
(457, ' Protoshare'),
(458, ' Prototyping'),
(459, ' Protractor Javascript'),
(460, ' Puppet'),
(461, ' Push Notification'),
(462, ' Python'),
(463, ' Pytorch'),
(464, ' QlikView'),
(465, ' Qt'),
(466, ' Qualtrics Survey Platform'),
(467, ' QuickBase'),
(468, ' R Programming Language'),
(469, ' Racket'),
(470, ' RapidWeaver'),
(471, ' Raspberry Pi'),
(472, ' Ray-tracing'),
(473, ' React Native'),
(474, ' React.js'),
(475, ' React.js Framework'),
(476, ' REALbasic'),
(477, ' Red Hat'),
(478, ' Redis'),
(479, ' Redshift'),
(480, ' Redux.js'),
(481, ' Regular Expressions'),
(482, ' RESTful'),
(483, ' RESTful API'),
(484, ' Revit'),
(485, ' Revit Architecture'),
(486, ' Roadnet'),
(487, ' Rocket Engine'),
(488, ' RSS'),
(489, ' Ruby'),
(490, ' Ruby on Rails'),
(491, ' Rust'),
(492, ' RxJS'),
(493, ' Sails.js'),
(494, ' Salesforce App Development'),
(495, ' Salesforce Commerce Cloud'),
(496, ' Salesforce Marketing Cloud'),
(497, ' Samsung Accessory SDK'),
(498, ' SAP'),
(499, ' SAP 4 Hana'),
(500, ' SAP BODS'),
(501, ' SAP Business Planning and Consolidation'),
(502, ' SAP CPI'),
(503, ' SAP HANA'),
(504, ' SAP Hybris'),
(505, ' SAP Pay'),
(506, ' SAP PI'),
(507, ' SAP Transformation'),
(508, ' Sass'),
(509, ' Scala'),
(510, ' Scheme'),
(511, ' Scikit Learn'),
(512, ' SciPy'),
(513, ' SCORM'),
(514, ' Scrapy'),
(515, ' Script Install'),
(516, ' Scripting'),
(517, ' Scrum'),
(518, ' Scrum Development'),
(519, ' SD-WAN'),
(520, ' SDW N17 Service Qualification'),
(521, ' Segment'),
(522, ' Selenium'),
(523, ' Selenium Webdriver'),
(524, ' Sencha / YahooUI'),
(525, ' SEO'),
(526, ' SEO Auditing'),
(527, ' Server'),
(528, ' Server to Server Facebook API Integration'),
(529, ' ServiceNow'),
(530, ' SFDC'),
(531, ' Sharepoint'),
(532, ' Shell Script'),
(533, ' Shopify'),
(534, ' Shopify Development'),
(535, ' Shopping Carts'),
(536, ' Siebel'),
(537, ' Silverlight'),
(538, ' Sketching'),
(539, ' Slack'),
(540, ' Smarty PHP'),
(541, ' Snapchat'),
(542, ' Social Engine'),
(543, ' Social Media Management'),
(544, ' Social Networking'),
(545, ' Socket IO'),
(546, ' Software Architecture'),
(547, ' Software Development'),
(548, ' Software Testing'),
(549, ' Solaris'),
(550, ' Soldering'),
(551, ' Solutions Architecture'),
(552, ' Spark'),
(553, ' Sphinx'),
(554, ' Splunk'),
(555, ' SPSS Statistics'),
(556, ' SQL'),
(557, ' SQLite'),
(558, ' Squarespace'),
(559, ' Squid Cache'),
(560, ' SSIS (SQL Server Integration Services)'),
(561, ' Steam API'),
(562, ' Storage Area Networks'),
(563, ' Storm'),
(564, ' Stripe'),
(565, ' Subversion'),
(566, ' SugarCRM'),
(567, ' SVG'),
(568, ' Swift'),
(569, ' Swift Package Manager'),
(570, ' Swing (Java)'),
(571, ' Symfony PHP'),
(572, ' System Admin'),
(573, ' T-SQL (Transact Structures Query Language)'),
(574, ' Tableau'),
(575, ' Tally Definition Language'),
(576, ' TaoBao API'),
(577, ' Tealium'),
(578, ' TeamCity'),
(579, ' Tensorflow'),
(580, ' Test'),
(581, ' Test Automation'),
(582, ' Testing / QA'),
(583, ' TestStand'),
(584, ' Tibco Spotfire'),
(585, ' Time & Labor SAP'),
(586, ' Titanium'),
(587, ' Tizen SDK for Wearables'),
(588, ' Travis CI'),
(589, ' Troubleshooting'),
(590, ' Tumblr'),
(591, ' TvOS'),
(592, ' Twilio'),
(593, ' Twitter'),
(594, ' Twitter API'),
(595, ' Typescript'),
(596, ' Typing'),
(597, ' TYPO3'),
(598, ' Ubuntu'),
(599, ' Umbraco'),
(600, ' UML Design'),
(601, ' Underscore.js'),
(602, ' Unity 3D'),
(603, ' UNIX'),
(604, ' Unreal Engine'),
(605, ' Usability Testing'),
(606, ' User Interface / IA'),
(607, ' V-Play'),
(608, ' Vapor'),
(609, ' Varnish Cache'),
(610, ' VB.NET'),
(611, ' VBScript'),
(612, ' vBulletin'),
(613, ' Veeam'),
(614, ' Version Control Git'),
(615, ' VertexFX'),
(616, ' Vim'),
(617, ' Virtual Machines'),
(618, ' Virtual Worlds'),
(619, ' Virtuemart'),
(620, ' Virtuozzo'),
(621, ' Visual Basic'),
(622, ' Visual Basic for Apps'),
(623, ' Visual Foxpro'),
(624, ' Visualization'),
(625, ' VMware'),
(626, ' VoiceXML'),
(627, ' VoIP'),
(628, ' Volusion'),
(629, ' Vowpal Wabbit'),
(630, ' VPS'),
(631, ' vTiger'),
(632, ' VtrunkD'),
(633, ' Vue.js'),
(634, ' Vue.js Framework'),
(635, ' Vuforia'),
(636, ' WatchKit'),
(637, ' Web API'),
(638, ' Web Crawling'),
(639, ' Web Development'),
(640, ' Web Hosting'),
(641, ' Web Scraping'),
(642, ' Web Security'),
(643, ' Web Services'),
(644, ' Webflow'),
(645, ' webMethods'),
(646, ' Website Analytics'),
(647, ' Website Management'),
(648, ' Website Testing'),
(649, ' Weebly'),
(650, ' WHMCS'),
(651, ' Windows 8'),
(652, ' Windows API'),
(653, ' Windows Desktop'),
(654, ' Windows Server'),
(655, ' WinJS'),
(656, ' Wix'),
(657, ' WordPress'),
(658, ' WPF'),
(659, ' Wufoo'),
(660, ' x86/x64 Assembler'),
(661, ' Xamarin'),
(662, ' XAML'),
(663, ' Xara'),
(664, ' Xcodebuild'),
(665, ' XHTML'),
(666, ' XML'),
(667, ' XMPP'),
(668, ' Xojo'),
(669, ' Xoops'),
(670, ' XPages'),
(671, ' xpath'),
(672, ' XQuery'),
(673, ' XSLT'),
(674, ' XSS (Cross-site scripting)'),
(675, ' Yarn'),
(676, ' Yii'),
(677, ' Yii2'),
(678, ' YouTube'),
(679, ' Zen Cart'),
(680, ' Zend'),
(681, ' Zendesk'),
(682, ' Znode'),
(683, ' Zoho'),
(684, 'Post a Project'),
(685, 'Sign up for work'),
(686, ' Amazon Fire'),
(687, ' Amazon Kindle'),
(688, ' Android'),
(689, ' App Store Optimization'),
(690, ' App Usability Analysis'),
(691, ' Appcelerator Titanium'),
(692, ' Apple Watch'),
(693, ' Blackberry'),
(694, ' Geolocation'),
(695, ' iPad'),
(696, ' iPhone'),
(697, ' J2ME'),
(698, ' Kotlin'),
(699, ' Metro'),
(700, ' Mobile App Development'),
(701, ' Nokia'),
(702, ' Palm'),
(703, ' Salesforce Lightning'),
(704, ' Samsung'),
(705, ' Symbian'),
(706, ' Virtualization'),
(707, ' WebOS'),
(708, ' Windows CE'),
(709, ' Windows Mobile'),
(710, ' Windows Phone'),
(711, ' Academic Writing'),
(712, ' Apple iBooks Author'),
(713, ' Article Rewriting'),
(714, ' Article Writing'),
(715, ' Blog'),
(716, ' Blog Writing'),
(717, ' Book Writing'),
(718, ' Business Writing'),
(719, ' Cartography & Maps'),
(720, ' Catch Phrases'),
(721, ' Communications'),
(722, ' Compliance and Safety Procedures Writer'),
(723, ' Content Strategy'),
(724, ' Content Writing'),
(725, ' Copy Editing'),
(726, ' Copy Typing'),
(727, ' Copywriting'),
(728, ' Creative Writing'),
(729, ' eBooks'),
(730, ' Editing'),
(731, ' Editorial Writing'),
(732, ' Essay Writing'),
(733, ' Fiction'),
(734, ' Financial Research'),
(735, ' Forum Posting'),
(736, ' Ghostwriting'),
(737, ' Grant Writing'),
(738, ' LaTeX'),
(739, ' Medical Writing'),
(740, ' Newsletters'),
(741, ' Online Writing'),
(742, ' PDF'),
(743, ' Poetry'),
(744, ' Powerpoint'),
(745, ' Press Releases'),
(746, ' Product Descriptions'),
(747, ' Proofreading'),
(748, ' Proposal/Bid Writing'),
(749, ' Publishing'),
(750, ' Report Writing'),
(751, ' Research'),
(752, ' Research Writing'),
(753, ' Resumes'),
(754, ' Reviews'),
(755, ' Romance Writing'),
(756, ' Screenwriting'),
(757, ' SEO Writing'),
(758, ' Short Stories'),
(759, ' Slogans'),
(760, ' Speech Writing'),
(761, ' Technical Documentation'),
(762, ' Technical Writing'),
(763, ' Test Plan Writing'),
(764, ' Test Strategy Writing'),
(765, ' Translation'),
(766, ' Travel Writing'),
(767, ' Web Page Writer'),
(768, ' WIKI'),
(769, ' Wikipedia'),
(770, ' Word Processing'),
(771, ' Writing'),
(772, ' 2D Animation'),
(773, ' 360-degree video'),
(774, ' 3D Animation'),
(775, ' 3D Design'),
(776, ' 3D Model Maker'),
(777, ' 3D Modelling'),
(778, ' 3D Rendering'),
(779, ' 3D Scanning'),
(780, ' 3ds Max'),
(781, ' ActionScript'),
(782, ' Adobe Dreamweaver'),
(783, ' Adobe Fireworks'),
(784, ' Adobe Flash'),
(785, ' Adobe FrameMaker'),
(786, ' Adobe InDesign'),
(787, ' Adobe Lightroom'),
(788, ' Adobe LiveCycle Designer'),
(789, ' Adobe Robohelp'),
(790, ' Advertisement Design'),
(791, ' After Effects'),
(792, ' Animated Video Development'),
(793, ' Animation'),
(794, ' App Designer'),
(795, ' Apple Compressor'),
(796, ' Apple Logic Pro'),
(797, ' Apple Motion'),
(798, ' Architectural Rendering'),
(799, ' Arts & Crafts'),
(800, ' Audio Editing'),
(801, ' Audio Production'),
(802, ' Audio Services'),
(803, ' AutoCAD Architecture'),
(804, ' Autodesk Inventor'),
(805, ' Autodesk Revit'),
(806, ' Autodesk Sketchbook Pro'),
(807, ' Axure'),
(808, ' Banner Design'),
(809, ' Blog Design'),
(810, ' Book Artist'),
(811, ' Bootstrap'),
(812, ' Brochure Design'),
(813, ' Building Architecture'),
(814, ' Business Card Design'),
(815, ' Business Cards'),
(816, ' Capture NX2'),
(817, ' Caricature & Cartoons'),
(818, ' CGI'),
(819, ' Cinema 4D'),
(820, ' Commercials'),
(821, ' Concept Art'),
(822, ' Concept Design'),
(823, ' Corel Painter'),
(824, ' Corporate Identity'),
(825, ' Covers & Packaging'),
(826, ' Creative Design'),
(827, ' CSS'),
(828, ' DaVinci Resolve'),
(829, ' Design'),
(830, ' eLearning Designer'),
(831, ' Explainer Videos'),
(832, ' Fashion Design'),
(833, ' Fashion Modeling'),
(834, ' Filmmaking'),
(835, ' Final Cut Pro'),
(836, ' Finale / Sibelius'),
(837, ' FL Studio'),
(838, ' Flash 3D'),
(839, ' Flash Animation'),
(840, ' Flex'),
(841, ' Flow Charts'),
(842, ' Flyer Design'),
(843, ' Format & Layout'),
(844, ' Front-end Design'),
(845, ' Furniture Design'),
(846, ' GarageBand'),
(847, ' Graphic Design'),
(848, ' Icon Design'),
(849, ' Illustration'),
(850, ' Illustrator'),
(851, ' Image Processing'),
(852, ' iMovie'),
(853, ' Industrial Design'),
(854, ' Infographics'),
(855, ' Infrastructure Architecture'),
(856, ' Instagram Marketing'),
(857, ' Interior Design'),
(858, ' Invision'),
(859, ' Invitation Design'),
(860, ' JDF'),
(861, ' Kinetic Typography'),
(862, ' Label Design'),
(863, ' Landing Pages'),
(864, ' Logo Design'),
(865, ' Makerbot'),
(866, ' Maya'),
(867, ' Motion Graphics'),
(868, ' Music'),
(869, ' Neo4j'),
(870, ' Package Design'),
(871, ' Packaging Design'),
(872, ' Pattern Making'),
(873, ' Photo Editing'),
(874, ' Photo Restoration'),
(875, ' Photo Retouching'),
(876, ' Photography'),
(877, ' Photoshop'),
(878, ' Photoshop Design'),
(879, ' Post-Production'),
(880, ' Poster Design'),
(881, ' Pre-production'),
(882, ' Presentations'),
(883, ' Prezi'),
(884, ' Print'),
(885, ' Product Photography'),
(886, ' Prototype Design'),
(887, ' PSD to HTML'),
(888, ' PSD2CMS'),
(889, ' QuarkXPress'),
(890, ' RWD'),
(891, ' Shopify Templates'),
(892, ' Sign Design'),
(893, ' Sketch'),
(894, ' SketchUp'),
(895, ' Sound Design'),
(896, ' Stationery Design'),
(897, ' Sticker Design'),
(898, ' Storyboard'),
(899, ' T-Shirts'),
(900, ' Tattoo Design'),
(901, ' Tekla Structures'),
(902, ' Templates'),
(903, ' Typography'),
(904, ' Urban Design'),
(905, ' User Experience Design'),
(906, ' User Interface Design'),
(907, ' Vectorization'),
(908, ' Vehicle Signage'),
(909, ' Video Broadcasting'),
(910, ' Video Editing'),
(911, ' Video Post-editing'),
(912, ' Video Production'),
(913, ' Video Services'),
(914, ' Video Tours'),
(915, ' Videography'),
(916, ' VideoScribe'),
(917, ' Visual Arts'),
(918, ' Voice Talent'),
(919, ' Website Design'),
(920, ' Wireframes'),
(921, ' Word'),
(922, ' Yahoo! Store Design'),
(923, ' Zbrush'),
(924, ' Article Submission'),
(925, ' Bookkeeping'),
(926, ' BPO'),
(927, ' Call Center'),
(928, ' Customer Service'),
(929, ' Customer Support'),
(930, ' Data Analytics'),
(931, ' Data Architecture'),
(932, ' Data Cleansing'),
(933, ' Data Delivery'),
(934, ' Data Entry'),
(935, ' Data Extraction'),
(936, ' Data Processing'),
(937, ' Data Scraping'),
(938, ' Database Design'),
(939, ' Desktop Support'),
(940, ' Email Handling'),
(941, ' ePub'),
(942, ' Excel'),
(943, ' Excel Macros'),
(944, ' Excel VB Capabilities'),
(945, ' Excel VBA'),
(946, ' General Office'),
(947, ' Helpdesk'),
(948, ' Infographic and Powerpoint Slide Designing'),
(949, ' Investment Research'),
(950, ' Microsoft Office'),
(951, ' Microsoft Outlook'),
(952, ' Order Processing'),
(953, ' Phone Support'),
(954, ' PostgreSQL Administration'),
(955, ' Procurement'),
(956, ' Qlik'),
(957, ' Qualitative Research'),
(958, ' qwerty'),
(959, ' Relational Databases'),
(960, ' SAP Master Data Governance'),
(961, ' Software Documentation'),
(962, ' Technical Support'),
(963, ' Telephone Handling'),
(964, ' Time Management'),
(965, ' Transcription'),
(966, ' Video Upload'),
(967, ' Virtual Assistant'),
(968, ' Web Search'),
(969, 'Post a Project'),
(970, 'Sign up for work'),
(971, ' 802.11'),
(972, ' Acoustical Engineering'),
(973, ' Aeronautical Engineering'),
(974, ' Aerospace Engineering'),
(975, ' Agronomy'),
(976, ' AI (Artificial Intelligence) HW/SW'),
(977, ' Algorithm'),
(978, ' Analog'),
(979, ' Antenna Design'),
(980, ' Apple Homekit'),
(981, ' Apple MFI'),
(982, ' Arduino'),
(983, ' ARM'),
(984, ' ASIC'),
(985, ' Astrophysics'),
(986, ' Audio Processing'),
(987, ' AutoCAD'),
(988, ' Automotive'),
(989, ' Bare Metal'),
(990, ' Battery Charging and Batteries'),
(991, ' BeagleBone Black'),
(992, ' Bill of Materials (BOM) Analysis'),
(993, ' Bill of Materials (BOM) Evaluation'),
(994, ' Bill of Materials (BOM) Management'),
(995, ' Bill of Materials (BOM) Optimization'),
(996, ' Bill of Materials (BOM) Re-Engineering'),
(997, ' Biology'),
(998, ' Biotechnology'),
(999, ' Bluetooth'),
(1000, ' Bluetooth Module'),
(1001, ' Board Support Package (BSP)'),
(1002, ' Broadcast Engineering'),
(1003, ' CAD/CAM'),
(1004, ' Calculus'),
(1005, ' CATIA'),
(1006, ' Cellular Design'),
(1007, ' Cellular Modules'),
(1008, ' Chemical Engineering'),
(1009, ' Circuit Board Layout'),
(1010, ' Circuit Design'),
(1011, ' Civil Engineering'),
(1012, ' Clean Technology'),
(1013, ' Climate Sciences'),
(1014, ' Combinatorial Optimization'),
(1015, ' Combinatorial Problem Solving'),
(1016, ' Compliance Engineering'),
(1017, ' Computational Linguistics'),
(1018, ' Construction Monitoring'),
(1019, ' Consumer Products'),
(1020, ' Continuous Integration'),
(1021, ' Controller Area Network (CAN)'),
(1022, ' Cryptography'),
(1023, ' D0-178 Certification'),
(1024, ' D0-254 Certification'),
(1025, ' Data Mining'),
(1026, ' Data Science'),
(1027, ' Deep Learning'),
(1028, ' DevOps'),
(1029, ' DFM (Design for Manufacturing)'),
(1030, ' Digital Design'),
(1031, ' Digital Electronics'),
(1032, ' Drones'),
(1033, ' DSL/MODEMs'),
(1034, ' Electrical Engineering'),
(1035, ' Electronic Design'),
(1036, ' Electronics'),
(1037, ' Embedded Systems'),
(1038, ' Encryption'),
(1039, ' Energy'),
(1040, ' Engineering'),
(1041, ' Engineering Drawing'),
(1042, ' Engineering Mathematics'),
(1043, ' Finite Element Analysis'),
(1044, ' Flex Circuit Design'),
(1045, ' FPGA'),
(1046, ' FPGA Coding'),
(1047, ' Genealogy'),
(1048, ' Genetic Algorithms'),
(1049, ' Genetic Engineering'),
(1050, ' Geology'),
(1051, ' Geospatial'),
(1052, ' Geotechnical Engineering'),
(1053, ' GPS'),
(1054, ' Graphical User Interface (GUI)'),
(1055, ' HALT/HASS Testing'),
(1056, ' Health'),
(1057, ' Home Design'),
(1058, ' Human Sciences'),
(1059, ' I2C'),
(1060, ' Imaging'),
(1061, ' Industrial Engineering'),
(1062, ' Instrumentation'),
(1063, ' Intercom'),
(1064, ' Internet of Things (IoT)'),
(1065, ' Intrinsic Safety Applications'),
(1066, ' ISM Radio Module'),
(1067, ' Linear Programming'),
(1068, ' Local Interconnect Network (LIN)'),
(1069, ' LoRa'),
(1070, ' Machine Learning (ML)'),
(1071, ' Manufacturing Design'),
(1072, ' Materials Engineering'),
(1073, ' Mathematics'),
(1074, ' MATLAB'),
(1075, ' Matlab and Mathematica'),
(1076, ' Mechanical Engineering'),
(1077, ' Mechatronics'),
(1078, ' Medical'),
(1079, ' Microbiology'),
(1080, ' Microcontroller'),
(1081, ' Microstation'),
(1082, ' Mining Engineering'),
(1083, ' Motor Control'),
(1084, ' Nanotechnology'),
(1085, ' Natural Language'),
(1086, ' Near Field Communication (NFC)'),
(1087, ' Neural Networks'),
(1088, ' PCB Design and Layout'),
(1089, ' PCB Layout'),
(1090, ' PCI Express'),
(1091, ' Petroleum Engineering'),
(1092, ' Physics'),
(1093, ' PLC & SCADA'),
(1094, ' Power Amplifier RF'),
(1095, ' Power Converters'),
(1096, ' Power Generation'),
(1097, ' Power Redesign'),
(1098, ' Product End of Life (EOL)'),
(1099, ' Product Management'),
(1100, ' Project Scheduling'),
(1101, ' Psychology'),
(1102, ' Qi'),
(1103, ' Quality and Reliability Testing'),
(1104, ' Quantum'),
(1105, ' RADAR/LIDAR'),
(1106, ' Radio Frequency'),
(1107, ' Radio Frequency Engineering'),
(1108, ' Rapid Prototyping'),
(1109, ' Remote Sensing'),
(1110, ' Renewable Energy Design'),
(1111, ' Renewables'),
(1112, ' Rezence'),
(1113, ' RFID (Radio-frequency identification)'),
(1114, ' Robotic Process Automation'),
(1115, ' Robotics'),
(1116, ' Robotics and Cognitive Automation'),
(1117, ' RTOS'),
(1118, ' Schematic Review'),
(1119, ' Schematics'),
(1120, ' Scientific Computing'),
(1121, ' Scientific Research'),
(1122, ' Security'),
(1123, ' Semiconductor'),
(1124, ' Serial Peripheral Interface (SPI)'),
(1125, ' Signal Processing'),
(1126, ' Simulation'),
(1127, ' SMART City'),
(1128, ' Smart Lighting'),
(1129, ' Smart Phone/Tablet Apps'),
(1130, ' SoC Design'),
(1131, ' Solar'),
(1132, ' Solidworks'),
(1133, ' Statistical Analysis'),
(1134, ' Statistical Modeling'),
(1135, ' Statistics'),
(1136, ' Structural Engineering'),
(1137, ' Surfboard Design'),
(1138, ' Systems Engineering'),
(1139, ' Technology'),
(1140, ' Telecom'),
(1141, ' Telecommunications Engineering'),
(1142, ' Telecoms Engineering'),
(1143, ' Textile Engineering'),
(1144, ' Thermal & Environmental Testing'),
(1145, ' Thermal Analysis'),
(1146, ' Vector Calculus'),
(1147, ' Verilog / VHDL'),
(1148, ' Very-large-scale integration (VLSI)'),
(1149, ' Video Processing'),
(1150, ' Virtual Assistant Solutions (Alexa, Google, Siri, Home Kit, Cortana)'),
(1151, ' Waterproof Design (IP68)'),
(1152, ' WiFi'),
(1153, ' Wireless'),
(1154, ' Wireless Certification (CSA, FCC, IEC, FAA, IEEE, CE, Atex)'),
(1155, ' Wireless Charging'),
(1156, ' Wireless Radio Frequency Engineering'),
(1157, ' Wireless Sensors'),
(1158, ' Wolfram'),
(1159, ' Zigbee'),
(1160, ' Zwave'),
(1161, 'Post a Project'),
(1162, 'Sign up for work'),
(1163, ' 3D Printing'),
(1164, ' Alerting'),
(1165, ' Analog Electronics'),
(1166, ' Andon'),
(1167, ' Buyer Sourcing'),
(1168, ' CNC Programming'),
(1169, ' Computer Aided Manufacturing'),
(1170, ' Manufacturing'),
(1171, ' Process Automation'),
(1172, ' Process Validation'),
(1173, ' Product Design'),
(1174, ' Product Sourcing'),
(1175, ' Supplier Sourcing'),
(1176, ' Supply Chain'),
(1177, 'Post a Project'),
(1178, 'Sign up for work'),
(1179, ' Ad Planning & Buying'),
(1180, ' Advertising'),
(1181, ' Affiliate Marketing'),
(1182, ' Airbnb'),
(1183, ' Analytics Sales'),
(1184, ' ATS Sales'),
(1185, ' Brand Management'),
(1186, ' Brand Marketing'),
(1187, ' Branding'),
(1188, ' Bulk Marketing'),
(1189, ' Channel Account Management'),
(1190, ' Channel Sales'),
(1191, ' Classifieds Posting'),
(1192, ' ClickFunnels'),
(1193, ' Cloud Sales'),
(1194, ' Content Marketing'),
(1195, ' Conversion Rate Optimisation'),
(1196, ' CRM'),
(1197, ' Crowdfunding'),
(1198, ' Customer Retention Marketing'),
(1199, ' Datacenter Sales'),
(1200, ' Digital Agency Sales'),
(1201, ' eBay'),
(1202, ' Email Marketing'),
(1203, ' Emerging Accounts'),
(1204, ' Enterprise Sales'),
(1205, ' Enterprise Sales Management'),
(1206, ' Etsy'),
(1207, ' Facebook Marketing'),
(1208, ' Field Sales'),
(1209, ' Field Sales Management'),
(1210, ' Financial Sales'),
(1211, ' Google Adsense'),
(1212, ' Google Adwords'),
(1213, ' Healthcare Sales'),
(1214, ' HR Sales'),
(1215, ' IDM Sales'),
(1216, ' Indiegogo'),
(1217, ' Inside Sales'),
(1218, ' Interactive Advertising'),
(1219, ' Internet Marketing'),
(1220, ' Internet Research'),
(1221, ' ISV Sales'),
(1222, ' Journalism'),
(1223, ' Keyword Research'),
(1224, ' Kickstarter'),
(1225, ' Lead Generation'),
(1226, ' Leads'),
(1227, ' Life Science Sales'),
(1228, ' Mailchimp'),
(1229, ' Mailwizz'),
(1230, ' Market Research'),
(1231, ' Marketing'),
(1232, ' Marketing Strategy'),
(1233, ' Media Relations'),
(1234, ' Media Sales'),
(1235, ' Medical Devices Sales'),
(1236, ' MLM'),
(1237, ' Mobile Sales'),
(1238, ' Network Sales'),
(1239, ' OEM Account Management'),
(1240, ' OEM Sales'),
(1241, ' Pardot'),
(1242, ' Payroll Sales'),
(1243, ' Periscope'),
(1244, ' PPC Marketing'),
(1245, ' Recruiting Sales'),
(1246, ' Resellers'),
(1247, ' Retail Sales'),
(1248, ' SaaS Sales'),
(1249, ' Sales'),
(1250, ' Sales Account Management'),
(1251, ' Sales Management'),
(1252, ' Sales Promotion'),
(1253, ' Search Engine Marketing'),
(1254, ' Security Sales'),
(1255, ' SEOMoz'),
(1256, ' Social Media Marketing'),
(1257, ' Social Sales'),
(1258, ' Social Video Marketing'),
(1259, ' Software Sales'),
(1260, ' Technology Sales'),
(1261, ' Telecom Sales'),
(1262, ' Telemarketing'),
(1263, ' Twitter Marketing'),
(1264, ' Viral Marketing'),
(1265, ' Visual Merchandising'),
(1266, ' WooCommerce'),
(1267, 'Post a Project'),
(1268, 'Sign up for work'),
(1269, ' Bicycle Courier'),
(1270, ' Car Courier'),
(1271, ' Car Driving'),
(1272, ' Cargo Freight'),
(1273, ' Container Transport'),
(1274, ' Container Truck'),
(1275, ' Courier'),
(1276, ' Delivery'),
(1277, ' Dry Van Trucking'),
(1278, ' Flatbed Trucking'),
(1279, ' Flower Delivery'),
(1280, ' Food Takeaway'),
(1281, ' Freight'),
(1282, ' Frozen Trucking'),
(1283, ' Furniture Removalist'),
(1284, ' Haulier'),
(1285, ' Heavy Haulage'),
(1286, ' Heavy Haulage Trucking'),
(1287, ' Hiab Crane Trucking'),
(1288, ' Import/Export'),
(1289, ' Line Haulage'),
(1290, ' Logistics'),
(1291, ' Motorcycle Courier'),
(1292, ' Moving'),
(1293, ' Packing & Shipping'),
(1294, ' Parcel Delivery'),
(1295, ' Pickup'),
(1296, ' Reefer Trucking'),
(1297, ' Removal Services'),
(1298, ' Shipping'),
(1299, ' Truck Courier'),
(1300, ' Trucking'),
(1301, ' Van Courier'),
(1302, 'Post a Project'),
(1303, 'Sign up for work'),
(1304, ' Account Management'),
(1305, ' Account Payables Management'),
(1306, ' Account Receivables Management'),
(1307, ' Accounting'),
(1308, ' Administrative Support'),
(1309, ' Attorney'),
(1310, ' Audit'),
(1311, ' Autotask'),
(1312, ' Bank Reconciliation'),
(1313, ' Brain Storming'),
(1314, ' Budgeting and Forecasting'),
(1315, ' Business Analysis'),
(1316, ' Business Analytics'),
(1317, ' Business Coaching'),
(1318, ' Business Plans'),
(1319, ' Business Requirement Documentation'),
(1320, ' Business Strategy'),
(1321, ' Care Management'),
(1322, ' Certified Public Accountant'),
(1323, ' Christmas'),
(1324, ' Closer'),
(1325, ' Compensation and Benefits'),
(1326, ' Compliance'),
(1327, ' Compliance and Safety Training'),
(1328, ' Contracts'),
(1329, ' Core Consulting Skills'),
(1330, ' Core Systems Transformation'),
(1331, ' Corporate Income Tax'),
(1332, ' Corporate Transactions'),
(1333, ' Crystal Reports'),
(1334, ' Custom Duties Tax'),
(1335, ' Customer Experience'),
(1336, ' Customer Retention'),
(1337, ' Customer Strategy'),
(1338, ' Customs and Global Trade Services'),
(1339, ' Data Analysis'),
(1340, ' EBS Finance'),
(1341, ' EBS Procurement'),
(1342, ' Econometrics'),
(1343, ' Economics'),
(1344, ' ECPay'),
(1345, ' Education & Tutoring'),
(1346, ' Employee Experience'),
(1347, ' Employee Training'),
(1348, ' Employment Law'),
(1349, ' Employment Tax'),
(1350, ' Energy and Resource Tax'),
(1351, ' Entrepreneurship'),
(1352, ' Equity Transaction Advice'),
(1353, ' ERP'),
(1354, ' Event Planning'),
(1355, ' Executive Compensation'),
(1356, ' Executive Reward'),
(1357, ' Expatriate Tax'),
(1358, ' External Auditing'),
(1359, ' Finance'),
(1360, ' Finance Transformation'),
(1361, ' Financial Accounting'),
(1362, ' Financial Analysis'),
(1363, ' Financial Forecasting'),
(1364, ' Financial Markets'),
(1365, ' Financial Modeling'),
(1366, ' Financial Services Tax'),
(1367, ' FIX API'),
(1368, ' Fundraising'),
(1369, ' General Tax Advisory'),
(1370, ' Global Mobility'),
(1371, ' Global Tax Compliance'),
(1372, ' Health Care Management'),
(1373, ' Health Planning'),
(1374, ' Health Plans Digitization'),
(1375, ' History'),
(1376, ' Human Resources'),
(1377, ' Immigration'),
(1378, ' Immigration Law'),
(1379, ' Indirect Tax'),
(1380, ' Insurance'),
(1381, ' Interviewing'),
(1382, ' Intuit QuickBooks'),
(1383, ' Inventory Management'),
(1384, ' ISO9001'),
(1385, ' Jewellery'),
(1386, ' Leadership Development'),
(1387, ' Legal'),
(1388, ' Legal Research'),
(1389, ' Legal Writing'),
(1390, ' Life Coaching'),
(1391, ' Life Science Tax Services'),
(1392, ' LinkedIn Recruiting'),
(1393, ' Linnworks Order Management'),
(1394, ' Logistics Company'),
(1395, ' M&A Tax'),
(1396, ' Management'),
(1397, ' Management Consulting'),
(1398, ' Manufacturing Strategy'),
(1399, ' Market Sizing'),
(1400, ' Media and Entertainment Tax'),
(1401, ' Mergers and Acquisitions'),
(1402, ' MYOB'),
(1403, ' nCino'),
(1404, ' Nintex Forms'),
(1405, ' Nintex Workflow'),
(1406, ' Nutrition'),
(1407, ' Operations Research'),
(1408, ' Organization Design'),
(1409, ' Organizational Change Management'),
(1410, ' Paralegal Services'),
(1411, ' Patents'),
(1412, ' PAYE Tax'),
(1413, ' Payroll'),
(1414, ' Payroll HR S&E'),
(1415, ' PeopleSoft'),
(1416, ' Personal Development'),
(1417, ' Personal Income Tax'),
(1418, ' Personal Tax'),
(1419, ' Private Client'),
(1420, ' Project Management'),
(1421, ' Project Management Office'),
(1422, ' Property Development'),
(1423, ' Property Law'),
(1424, ' Property Management'),
(1425, ' Public Relations'),
(1426, ' Public Sector and Taxation'),
(1427, ' Real Estate'),
(1428, ' Real Estate Tax'),
(1429, ' Recruitment'),
(1430, ' Report Development'),
(1431, ' Research and Development'),
(1432, ' Reward'),
(1433, ' Risk Management'),
(1434, ' Salesforce CPQ'),
(1435, ' Salesforce.com'),
(1436, ' SAS'),
(1437, ' Share Schemes'),
(1438, ' Shared Services'),
(1439, ' Social Security Tax'),
(1440, ' Sourcing'),
(1441, ' Sports'),
(1442, ' Startup Consulting'),
(1443, ' Startups'),
(1444, ' Talent Acquisition'),
(1445, ' Tax'),
(1446, ' Tax Accounting'),
(1447, ' Tax Centre of Excellence'),
(1448, ' Tax Compliance'),
(1449, ' Tax Compliance and Outsourcing'),
(1450, ' Tax Law'),
(1451, ' Tax Management Consulting'),
(1452, ' Tax Preparation'),
(1453, ' Tax Reporting'),
(1454, ' Tax Risk Management'),
(1455, ' Tax Technology'),
(1456, ' Technical Recruiter'),
(1457, ' Total Reward'),
(1458, ' Trademark'),
(1459, ' Trademark Registration'),
(1460, ' Trading'),
(1461, ' Training'),
(1462, ' Training Development'),
(1463, ' Transaction Tax'),
(1464, ' Transfer Pricing'),
(1465, ' Unit4 Business World'),
(1466, ' Valuation & Appraisal'),
(1467, ' Value Added Tax'),
(1468, ' Value Based Healthcare'),
(1469, ' Visa / Immigration'),
(1470, ' Weddings'),
(1471, ' Workday Financials'),
(1472, ' Workflow Consulting'),
(1473, ' Xero'),
(1474, ' Afrikaans'),
(1475, ' Albanian'),
(1476, 'Amharic'),
(1477, ' Arabic'),
(1478, ' Basque'),
(1479, ' Bengali'),
(1480, ' Bosnian'),
(1481, ' Bulgarian'),
(1482, ' Catalan'),
(1483, ' Croatian'),
(1484, ' Czech'),
(1485, ' Danish'),
(1486, ' Dari'),
(1487, ' Dutch'),
(1488, ' English (UK)'),
(1489, ' English (US)'),
(1490, ' English Grammar'),
(1491, ' English Spelling'),
(1492, ' Estonian'),
(1493, ' Filipino'),
(1494, ' Finnish'),
(1495, ' French'),
(1496, ' French (Canadian)'),
(1497, ' Georgian'),
(1498, ' German'),
(1499, ' Greek'),
(1500, ' Hebrew'),
(1501, ' Hindi'),
(1502, ' Hungarian'),
(1503, ' Indonesian'),
(1504, ' Interpreter'),
(1505, ' Italian'),
(1506, ' Japanese'),
(1507, ' Kannada'),
(1508, ' Korean'),
(1509, ' Latvian'),
(1510, ' Linguistics'),
(1511, ' Lithuanian'),
(1512, ' Macedonian'),
(1513, ' Malay'),
(1514, ' Malayalam'),
(1515, ' Maltese'),
(1516, ' Norwegian'),
(1517, ' Poet'),
(1518, ' Polish'),
(1519, ' Portuguese'),
(1520, ' Portuguese (Brazil)'),
(1521, ' Punjabi'),
(1522, ' Romanian'),
(1523, ' Russian'),
(1524, ' Serbian'),
(1525, ' Simplified Chinese (China)'),
(1526, ' Slovakian'),
(1527, ' Slovenian'),
(1528, ' Spanish'),
(1529, ' Spanish (Spain)'),
(1530, ' Swedish'),
(1531, ' Tamil'),
(1532, ' Telugu'),
(1533, ' Thai'),
(1534, 'Tigrinya'),
(1535, ' Traditional Chinese (Hong Kong)'),
(1536, ' Traditional Chinese (Taiwan)'),
(1537, ' Turkish'),
(1538, ' Ukrainian'),
(1539, ' Urdu'),
(1540, ' Vietnamese'),
(1541, ' Voice Artist'),
(1542, ' Welsh'),
(1543, ' Yiddish'),
(1544, 'Post a Project'),
(1545, 'Sign up for work'),
(1546, ' Air Conditioning'),
(1547, ' Antenna Services'),
(1548, ' Appliance Installation'),
(1549, ' Appliance Repair'),
(1550, ' Asbestos Removal'),
(1551, ' Asphalt'),
(1552, ' Attic Access Ladders Making'),
(1553, ' Awnings'),
(1554, ' Balustrading'),
(1555, ' Bamboo Flooring'),
(1556, ' Bathroom'),
(1557, ' Biometrics'),
(1558, ' Bracket Installation'),
(1559, ' Bricklaying'),
(1560, ' Building'),
(1561, ' Building Certification'),
(1562, ' Building Consulting'),
(1563, ' Building Design'),
(1564, ' Building Surveying'),
(1565, ' Car Washing'),
(1566, ' Carpentry'),
(1567, ' Carpet Cleaning'),
(1568, ' Carpet Repair & Laying'),
(1569, ' Carports'),
(1570, ' Carwashing'),
(1571, ' Casting'),
(1572, ' CCTV'),
(1573, ' CCTV Repair'),
(1574, ' Ceiling Installation'),
(1575, ' Cement Bonding Agents'),
(1576, ' Clothesline Installation'),
(1577, ' Column Installation'),
(1578, ' Commercial Cleaning'),
(1579, ' Computer Repair'),
(1580, ' Computer Support'),
(1581, ' Concreting'),
(1582, ' Contact Center Services'),
(1583, ' Cooking & Recipes'),
(1584, ' Cooking / Baking'),
(1585, ' Courses'),
(1586, ' Damp Proofing'),
(1587, ' Decking'),
(1588, ' Decoration'),
(1589, ' Demolition'),
(1590, ' Disposals'),
(1591, ' Domestic Cleaning'),
(1592, ' Drafting'),
(1593, ' Drain Plumbing'),
(1594, ' Drone Photography'),
(1595, ' Electric Repair'),
(1596, ' Embroidery'),
(1597, ' Epic Systems'),
(1598, ' Equipment Rental'),
(1599, ' Event Staffing'),
(1600, ' Excavation'),
(1601, ' Extensions & Additions'),
(1602, ' Fencing'),
(1603, ' Feng Shui'),
(1604, ' Field Technical Support'),
(1605, ' Financial Planning'),
(1606, ' Flashmob'),
(1607, ' Floor Coatings'),
(1608, ' Flooring'),
(1609, ' Flyscreen Installation'),
(1610, ' Frames & Trusses'),
(1611, ' Furniture Assembly'),
(1612, ' Gardening'),
(1613, ' Gas Fitting'),
(1614, ' General Labor'),
(1615, ' Glass / Mirror & Glazing'),
(1616, ' Gutter Installation'),
(1617, ' Hair Styles'),
(1618, ' Handyman'),
(1619, ' Heating Systems'),
(1620, ' Home Automation'),
(1621, ' Home Organization'),
(1622, ' Horticulture'),
(1623, ' Hot Water Installation'),
(1624, ' House Cleaning'),
(1625, ' Housework'),
(1626, ' IKEA Installation'),
(1627, ' Inspections'),
(1628, ' Installation'),
(1629, ' Interiors'),
(1630, ' Kitchen'),
(1631, ' Landscape Design'),
(1632, ' Landscaping'),
(1633, ' Landscaping & Gardening'),
(1634, ' Laundry and Ironing'),
(1635, ' Lawn Mowing'),
(1636, ' Lifestyle Coach'),
(1637, ' Lighting'),
(1638, ' Local Job'),
(1639, ' Locksmith'),
(1640, ' Lost-wax Casting'),
(1641, ' Machinery Equipment Hire'),
(1642, ' Make Up'),
(1643, ' Material Coating'),
(1644, ' Millwork'),
(1645, ' Mobile Repair'),
(1646, ' Mobile Welding'),
(1647, ' Mortgage Brokering'),
(1648, ' Mural Painting'),
(1649, ' Painting'),
(1650, ' Pavement'),
(1651, ' Pest Control'),
(1652, ' Pet Sitting'),
(1653, ' Piping'),
(1654, ' Plumbing'),
(1655, ' Printer Repair'),
(1656, ' Roofing'),
(1657, ' Sculpturing'),
(1658, ' Security Camera'),
(1659, ' Security Systems'),
(1660, ' Sewing'),
(1661, ' Shopping'),
(1662, ' Teaching/Lecturing'),
(1663, ' Tiling'),
(1664, ' Travel Ready'),
(1665, ' Upholstery Cleaning'),
(1666, ' Visa Ready Resources'),
(1667, ' Workshops'),
(1668, ' Yard Work & Removal'),
(1669, 'Post a Project'),
(1670, 'Sign up for work'),
(1671, ' Anything Goes'),
(1672, ' Appointment Setting'),
(1673, ' Computational Fluid Dynamics'),
(1674, ' Freelance'),
(1675, ' Podcasting'),
(1676, ' US Taxation');

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `id` int(3) NOT NULL,
  `parentid` int(3) NOT NULL,
  `subpagename` varchar(30) NOT NULL,
  `pageurl` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id`, `parentid`, `subpagename`, `pageurl`) VALUES
(2, 2, 'User Management', 'Employee'),
(4, 2, 'Category', 'Category'),
(7, 2, 'Freelancers', 'Freelancersadmin'),
(8, 2, 'Clients', 'Clients'),
(12, 3, 'Disputes', 'Disputeactive'),
(13, 3, 'Jobs', 'Jobsadmin'),
(17, 4, 'Withdraws', 'WithDraws'),
(19, 4, 'General Price', 'Price'),
(20, 3, 'Proposals', 'Proposaladmin'),
(24, 3, 'Message Reports', 'Messagereports'),
(25, 3, 'Badges', 'Badges'),
(26, 4, 'Pay Freelancer', 'Payfreelancer'),
(27, 5, 'Site Setting', 'Sitesettings'),
(28, 5, 'Mail Settings', 'MailSettings'),
(29, 5, 'Payment setting', 'Paymentsetting'),
(30, 5, 'Google Analytics', 'Googleanalytics'),
(31, 6, 'Active', 'Disputeactive'),
(32, 6, 'Resolved', 'Disputeinactive'),
(33, 2, 'Blog', 'Blogsetting'),
(34, 2, 'Verify Document', 'VerifyDocument'),
(35, 2, 'Customer support', 'Displayquery'),
(36, 2, 'Recommended Freelancers', 'Recommend_freelancers'),
(37, 2, 'Recommended Offers', 'Recommend_offers');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `trans_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `damount` text NOT NULL,
  `camount` text NOT NULL,
  `totalamt` text NOT NULL,
  `job_id` text DEFAULT NULL,
  `service_id` text DEFAULT NULL,
  `service_p_id` text DEFAULT NULL,
  `profile_featured_id` text DEFAULT NULL,
  `proposal_credits_purchase_id` int(11) NOT NULL,
  `proposal_id` text DEFAULT NULL,
  `proposal_featured_id` int(11) NOT NULL,
  `dispute_id` text DEFAULT NULL,
  `trans_type` enum('Profile_featured','jobs_adons','services_featured','service_purchased','prop_credits_purchased','proposal_accept','invoice_acept','feature_proposal','tip_amt','amt_deposit','amt_refunded','withdrawal','dispute','dispute_refund') NOT NULL,
  `date` datetime NOT NULL,
  `service_featured_id` int(11) NOT NULL,
  `in_escrow` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `is_clear` enum('Yes','No') NOT NULL DEFAULT 'No',
  `pg_transaction_id` text NOT NULL,
  `payment_gateway` enum('gigweb','paypal','paypalcc','stripecc') NOT NULL DEFAULT 'gigweb'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`trans_id`, `u_id`, `damount`, `camount`, `totalamt`, `job_id`, `service_id`, `service_p_id`, `profile_featured_id`, `proposal_credits_purchase_id`, `proposal_id`, `proposal_featured_id`, `dispute_id`, `trans_type`, `date`, `service_featured_id`, `in_escrow`, `is_clear`, `pg_transaction_id`, `payment_gateway`) VALUES
(140, 140, '1', '1', '1', '33', NULL, NULL, NULL, 0, '59', 0, NULL, 'proposal_accept', '2021-05-01 12:04:22', 0, 'No', 'Yes', 'ch_1ImHYWCvFHJfj2hEWNpmnz45', 'stripecc'),
(141, 0, '1', '0', '1', '33', NULL, NULL, NULL, 0, '59', 0, NULL, 'proposal_accept', '2021-05-01 12:04:22', 0, 'Yes', 'No', 'ch_1ImHYWCvFHJfj2hEWNpmnz45', 'stripecc'),
(142, 0, '0', '1.00', '1.00', '33', NULL, NULL, NULL, 0, NULL, 0, NULL, 'invoice_acept', '2021-05-01 12:06:01', 0, 'Yes', 'No', '', 'gigweb'),
(143, 0, '0', '0', '0', '33', NULL, NULL, NULL, 0, NULL, 0, NULL, 'invoice_acept', '2021-05-01 12:06:01', 0, 'No', 'Yes', '', 'gigweb'),
(144, 158, '1', '0', '1', '33', NULL, NULL, NULL, 0, NULL, 0, NULL, 'invoice_acept', '2021-05-01 12:06:01', 0, 'No', 'Yes', '', 'gigweb'),
(145, 140, '0', '0', '0', '34', NULL, NULL, NULL, 0, '62', 0, NULL, 'proposal_accept', '2021-05-03 13:19:01', 0, 'No', 'Yes', '9Y21009682341501Y', 'paypal'),
(146, 0, '0', '0', '0', '34', NULL, NULL, NULL, 0, '62', 0, NULL, 'proposal_accept', '2021-05-03 13:19:01', 0, 'Yes', 'No', '9Y21009682341501Y', 'paypal');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `dashboard` enum('0','1') NOT NULL DEFAULT '0',
  `pass` text NOT NULL,
  `Joining_date` date NOT NULL,
  `status` enum('Active','InActive','Block','Deactive') NOT NULL,
  `user_status` enum('User','Admin','Buyer','Employee','Moderator') NOT NULL,
  `verify` text NOT NULL,
  `location` varchar(50) NOT NULL,
  `dp` text NOT NULL,
  `cover` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `ip` text NOT NULL,
  `msgs` int(11) NOT NULL,
  `notifications` int(11) NOT NULL,
  `about` text NOT NULL,
  `oauth` text NOT NULL,
  `category` int(11) NOT NULL,
  `sub_cat` int(11) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `tags` text NOT NULL,
  `hourly_rate` varchar(80) NOT NULL,
  `skills` text NOT NULL,
  `profession` varchar(200) DEFAULT NULL,
  `language` text NOT NULL,
  `linked_account` text NOT NULL,
  `SecurityQuestion` varchar(250) NOT NULL,
  `Security Question` varchar(250) DEFAULT NULL,
  `can_login` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=Can login,1=Cant login',
  `SecurityAns` text NOT NULL,
  `payoneer_email` text NOT NULL,
  `stripe_email` text NOT NULL,
  `paypal_email` text NOT NULL,
  `working_hour_from` text NOT NULL,
  `working_hour_to` text NOT NULL,
  `last_activity` text NOT NULL,
  `is_featured` int(11) NOT NULL,
  `withdrawl_Acct_Status` enum('Pending','Approved','Not Approved','') DEFAULT NULL,
  `timezone` text NOT NULL,
  `otp` text NOT NULL,
  `show_name` varchar(100) NOT NULL DEFAULT 'full_name',
  `rating` text NOT NULL,
  `star` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `f_name`, `l_name`, `email`, `dashboard`, `pass`, `Joining_date`, `status`, `user_status`, `verify`, `location`, `dp`, `cover`, `username`, `ip`, `msgs`, `notifications`, `about`, `oauth`, `category`, `sub_cat`, `company_name`, `tags`, `hourly_rate`, `skills`, `profession`, `language`, `linked_account`, `SecurityQuestion`, `Security Question`, `can_login`, `SecurityAns`, `payoneer_email`, `stripe_email`, `paypal_email`, `working_hour_from`, `working_hour_to`, `last_activity`, `is_featured`, `withdrawl_Acct_Status`, `timezone`, `otp`, `show_name`, `rating`, `star`) VALUES
(1, 'Waqas', 'Hasan', 'admin@gmail.com', '1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2019-12-09', 'Active', 'Admin', '4279fbc1b26105613b403abf69b341315dcd560f15758392399197', 'London GB', 'uploads/rashid(2)11.JPG', 'uploads/croppedImg_986922824.jpeg', 'waqashassan123', '92.40.168.221', 0, 0, 'I AM WEB DEVELOPER \r\nWORKINGasdasd\r\nasdasdas\r\nasdasdasd\r\nasdasdasd\r\nzxczxczxc\r\nxcvxcv\r\nxcvxcvxc\r\nxcvxcv', '', 0, 0, '', 'HTML,JQUERY,Bootsrap,Ajx', '50', 'Web Designing,PHP', NULL, 'Urdu,English,Pashto', '', '1', NULL, '0', 'karachi', 'hamzanoor79@gmail.com', '', '', '', '', '', 0, 'Pending', '', '', 'first_name', '', ''),
(140, 'Cleaner', 'Wrasse', 'hello@cleanerwrasse.com', '0', '448469098aad61113f2a4b3d25c56e61b5b9bc6f', '2021-04-23', 'Active', 'Buyer', 'e0809938464da9f869dd2c0535ff5eb6302a33cf16191730067771', 'Norwich GB', 'uploads/CW_Logo1.png', 'uploads/croppedImg_1375030665.png', 'hello', '', 1, 0, 'Cleaner Wrasse is not like your regular home cleaning company. We like to think we are a customer service company that happens to clean homes in Bucks &amp; Beds.', '', 0, 0, '', '', '', '', NULL, '', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '', ''),
(141, 'Frank', 'Smith', 'franksmith777@hotmail.co.uk', '0', 'f5a3c113049a7d4b35be8642fe7b0c1904592611', '2021-04-23', 'Active', 'User', 'e6f2a26bd3e5364c6f99a343b95cab56b77cfe9516191778313943', 'Reading GB', 'uploads/Me.jpeg', 'uploads/croppedImg_2102918745.jpeg', 'franksmith777', '', 0, 0, '- Until the start of this year I had been Managing Editor of sports media and technology company Twenty3, having spent the last 14 years in full-time roles at media companies, including national newspapers and one of the most successful agencies in the country, which was the official content provider for some of the biggest sporting organisations in the world, including the British Olympic Association, the Football Association and Aviva Premiership, to name a few.\r\n- At Twenty3, I oversaw an editorial team which at times was up to 14 individuals and managed the delivery of content and the relationships with a host of clients, including Sky Sports, ESPN, The Sun and the International Champions Cup.\r\n- For long periods of the contract with the ICC, I was effectively in charge of all of their written and video output and also managed their 12 social media channels.\r\n- Prior to the above, I had been the Deputy Group Sports Editor of 14 regional newspapers and Sports Editor of the large weekly newspaper the Bucks Free Press.\r\n- For seven years I was the preeminent football writer covering Watford FC, where I worked extremely closely with board members and a host of managers, including Brendan Rodgers, Sean Dyche and Gianfranco Zola, to name a few. I was praised by fellow journalists and fans for my accuracy and integrity.\r\n- I have more than 14 years’ experience in live sports reporting and digital content production, and in the last five years I have focussed much of my time working on sporting organisations’ marketing campaigns from concept through to delivery.\r\n- As well as written word, I have managed countless number of video shoots, from one-on-one on-camera interviews with the likes of Sir Andy Murray and Sir Bradley Wiggins, to film shoots where there are upwards of 20 athletes on-site.\r\n- I’m an incredibly hard-working individual and pride myself on my attention to detail.\r\n- I have excellent communication skills and have proven myself to be capable of maintaining relationships with all key stakeholders involved with football clubs, sporting organisations and businesses, from junior staff up to multi-millionaire businessman and CEOs. ', '', 2, 337, '', 'Articles & News,Copywriting,Web content', '20', ' Article Writing, Blog Writing, Copy Editing, Editing, Proofreading', 'Experienced sports journalist and editor', 'English', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '100', 'assets/All_Icons/Badge-03.png'),
(142, 'Sarah', 'Catlin', 'info@catlindesigns.co.uk', '0', '67b755932a5427a16765096123cb71538c7548ec', '2021-04-23', 'Active', 'User', '1102311594768b77104faba16bb4ce63e6e6f85516191906261071', 'Manchester GB', 'uploads/profile-pic.jpg', 'uploads/croppedImg_1591719436.jpeg', 'info', '', 0, 0, 'I am a freelance Graphic and Web Designer with over 20 years of experience in the industry. I have clients ranging from small start-up companies to large organisations, I can assist you with all your graphic design needs.\r\n\r\nIf you are in need of online design work like website design and email campaigns, help with your business identity with logo designs, business stationery and exterior signs, or whether you require more traditional graphic design work like brochure design then I can help.\r\n\r\nNo job is too small or too big.\r\n\r\nWith a wide range of clients within many industries, covering areas as far away as Africa and America, distance and business type is not an issue. ', '', 3, 351, '', 'Website Design, Logo Design, Email Campaigns, Leaflet Design', '40', 'Graphic Design', 'Graphic Designer', '', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '100', 'assets/All_Icons/Badge-03.png'),
(143, 'Ali', 'Raza', 'engr.alinazir007@gmail.com', '0', '0b78b59a05cc2fad3e2d742690e87a1f3028e43f', '2021-04-28', 'Active', 'User', 'ef8359a1b62eaee05125013ca29b1f78f807108816195883086133', 'Lahore PK', 'uploads/83171319_2751533144913088_8615884732862824448_n.jpg', 'uploads/croppedImg_1732066533.jpeg', 'engr.alinazir007', '', 0, 0, '* Working on professional freelancing platforms for the last 8 years with 100\'s of satisfied clients.\r\n* Helped 3 Startups to get funded in 2019\r\n* Love to research about technology trends\r\n* Passionate developer (Web/Mobile)\r\n* Product Evangelist\r\n* Marketing enthusiast\r\n* Backed with a team of 100+ Dedicated developers\r\n\r\nI am a passionate developer with a strong zeal to work with emerging startups. Although I started my journey as a developer, I quickly understood that my clients were looking for much more than that (and that I could contribute more than just writing codes). I figured out that most of my client\'s wanted someone who they could trust as a technical partner for their products. Someone, who can give suggestions right from what tech should be picked up, how to get the UX right, how should we plan the product launch a lot more.\r\n\r\n\r\nIn the last 8 years, I got the opportunity to work with some of the most sophisticated (read complex) web and mobile apps. We went on to create some great products which are changing lives (quite literally). These applications belonged to a variety of domains business domains such as\r\n\r\n*E-commerce\r\n*Social Networks\r\n*Listing Platforms\r\n*CRM\r\n*Travel\r\n*Manufacturing\r\n\r\nOur results and 580+ happy clients clearly indicate that we are exceptional with the below technologies:\r\n\r\nJS development:\r\n* React\r\n* Angular\r\n* Node\r\n* Vue\r\n\r\nPHP Framework Development:\r\n* Laravel\r\n* Zend\r\n* Yii\r\n* Codeigniter\r\n* CakePHP\r\n* Phalcon\r\n\r\nContent Management Systems (CMS)\r\n* WordPress\r\n* Shopify\r\n* Joomla\r\n* Drupal\r\n\r\nMobile Apps\r\n* Android\r\n* iOS\r\n* React-Native\r\n* Ionic\r\n* Cordova/Phonegap\r\n\r\nServer and Deployment\r\n* AWS\r\n* Docker\r\n* Managed Cloud Services\r\n* CI/CD (DevOps)\r\n* Nginx\r\n* Page speed optimization\r\n\r\nWe love to speak with people and help them with all that we have got. Even today, we as a team get development requests starting as low as £500 to product development requests for as high as £100,000. The best part about all these requests is that regardless of their size, every request is considered with extraordinary care to ensure that the end product is nothing less than phenomenal. We have been enjoying each second of our journey and would love to add a lot of other names to our successful partnerships.\r\n______________\r\n\r\nIf you think you need someone who:\r\n*Would understand your product\r\n*Has got exceptional qualifications for delivery capacity\r\n*Can communicate well throughout the development life cycle\r\n*Make your product his priority\r\n\r\nYou seem to be at the right place :)\r\n\r\nEvery friend you have ever made would have been a stranger if you didn\'t say &quot;hi!&quot;\r\n\r\nI look forward to having a great, successful and rewarding relationship with you.\r\n\r\nLet\'s talk :)\r\n\r\nKind Regards', '', 1, 331, '', 'Web development,CSS,HTML,JAVA,PHP', '20', ' Website Design, Website Management, PHP, Java, Shopify Development', 'Web Developer', 'English,Urdu,Spanish', '', '', NULL, '0', '', 'engr.alinazir007@gmail.com', '', '', '', '', '', 0, 'Approved', '', '', 'full_name', '100', 'assets/All_Icons/Badge-05.png'),
(144, 'Muhammad', 'Hamza', 'hamzanoor79@gmail.com', '0', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2021-04-28', 'Active', 'Buyer', 'a75516618d831ded8b99d7426bc3bf4212ae540216196068607130', 'Islamabad PK', 'assets/images/dp.png', '', 'hamzanoor79', '', 0, 0, 'i am web developer', '', 0, 0, '', '', '', '', NULL, '', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '', ''),
(145, 'Muhammad', 'Hamza', 'hamzanoor78@gmail.com', '0', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2021-04-28', 'Active', 'User', '7e74098c9b2d01aadb23ca87e16c26f130d821c616196069434026', 'Islamabad PK', 'assets/images/dp.png', '', 'hamzanoor78', '', 0, 0, 'I AM a web developer', '', 1, 314, '', '', '10', 'html, CSS3', 'web developer', 'eglish', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '', ''),
(146, 'Tauseef', 'Abbas', 'TauseefAbbaswriter@gmail.com', '0', 'f08719a5b87f2096df766b359833537c13be76bc', '2021-04-29', 'Active', 'User', '99153dee3ee7b79435fc6ac43d64aa1187fc7cfd16197059288295', 'Rawalpindi PK', 'uploads/2018-03-22_15.15.04.png', 'uploads/croppedImg_1823956548.png', 'TauseefAbbaswriter', '', 0, 0, 'Welcome to my profile. \r\nMy name is Tauseef Abbas, I possess a master degree in management science and have two years of experience as deputy manager export in a multinational company of denim jeans.  \r\n\r\nI\'ve been a professional freelance writer for the last four years and have worked on hundreds of different projects that range from website content to article writing, from academic writing to script and speech writing, and from research and summaries writing to letter writing. \r\n\r\nI\'ve chosen freelance as my full-time profession and continue to do the wonders in online market of freelancing. \r\n\r\nIf you need any kind of content written, don\'t hesitate to hit me up.  \r\n\r\nKind regards, \r\nTauseef Abbas. ', '', 2, 332, '', 'Academic writing ,Copywriting,Articles/blog posts writing,Content writing,Speech and script writing', '25', ' Copywriting, Digital Marketing', 'I\'m a copy, content, and creative writer ', 'English,Urdu,Panjabi,Pashto', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '', ''),
(147, 'Ashish', 'Malviya', 'malviya.ashish86@gmail.com', '0', '75051dc18d3737b598e30ff3024b1e6c8ffc938e', '2021-04-30', 'Active', 'User', 'c33960a2f4efd386c67063bdbaf966c15eb6986b16197695966660', 'Bhop?l IN', 'assets/images/dp.png', '', 'malviya.ashish86', '', 0, 0, '', '', 0, 0, '', '', '', '', NULL, '', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '', ''),
(148, 'Yujin', 'Boby', 'admin@serverok.in', '0', '04b6830219568e2968ae85a6c7a91287cd876e5c', '2021-04-30', 'Active', 'User', 'fca1b413961c16c92ddf8784236d681fe81316d016197701764583', 'Alappuzha IN', 'uploads/skype-profile1.png', '', 'admin', '', 0, 0, 'I am a linux server administrator with 18+ years of experiance. I can help with Ubuntu/Debian/CentOS/RHEL servers. ', '', 1, 328, '', 'ubuntu,debian, rhel, amazon aws, google cloud', '30', ' Ubuntu, Linux, Debian, Amazon Web Services, Nginx', 'Linux Server Admin', 'English', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '', ''),
(149, 'NKUSI', 'KEVIN', 'nkusikvnhart@gmail.com', '0', '7f9a1a10a604b4dff082a906ff6c74d5379625ef', '2021-04-30', 'Active', 'User', 'c0852f8a6f8b889fa5870bb9b19dc459fbaca33216197706617782', 'Kigali RW', 'uploads/kevin.jpg', 'uploads/croppedImg_1708559776.jpeg', 'nkusikvnhart', '', 0, 0, 'Hi! I am  Kevin  a honest, kind, collaborative, quick learner, and responsible software developer  based  in Rwandan. Full stack web developer specializing in responsive web design/development for both backend and frontend; WordPress and JavaScript \r\n\r\nYOU NEED SOLUTIONS ! \r\n\r\nThere are many people out there with the ability to build and customize websites .But\r\nWhat is the goal and purpose of that website? Is that website designed from the outside to provide lasting solution for your business ? \r\n\r\nEvery project of mine begins with plan : \r\n\r\nWhy are you building  this site or making this customization? \r\nWhat specific audience are you looking to attract ? \r\n\r\nHow do we execute this plan most effectively and for this specific audience so that get you best results? \r\n\r\nFrom there we build.\r\nWe build strategically. \r\n\r\nSpecialties:\r\n+WordPress \r\n+HTML5,CSS3\r\n+JavaScript \r\n+PHP\r\n+Api Integration\r\n\r\n\r\n??MERN stack??\r\n?MongoDB(With Mongoose ORM)\r\n?Express\r\n? ReactJs(React-Redux-Redux thunk)\r\n?NodeJs\r\n\r\n\r\nWhat to expect:\r\n+High quality design and code\r\n+Fast delivery,meet deadlines \r\n+Ongoing support and availability \r\n+Clear and immediate communication\r\n\r\n \r\n\r\nWhy Choose Me For 10/hr?\r\n1.For clear and effective communication as am fluent English speaker \r\n2.Because am not looking for  to only complete the job and get and get another review to add on my scoreboard .I want to create real lasting ,personalized results for your business. \r\n3.i have a strong knowledge of the languages that make up Wordpress (HTML,CSS,JavaScript and PHP)and have worked to build sites from scratch and modify manipulate themes and plugins \r\n4.I also understand the web and how to achieve results with email marketing, how to apply the beat SEO practices, and I stay up to date with the latest digital solutions. \r\n\r\nSo what are we waiting for?Let\'s get started......\r\nPlease don\'t hesitate to reach out with any questions you have . \r\n\r\nI look forward to working with you !\r\n\r\nNkusi kevin ', '', 1, 314, '', 'website development,html5,javascript,css3,wordPress', '10', ' Javascript ES6, React.js Framework, WordPress, HTML5, CSS3', 'Website Developer', 'English', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '', ''),
(150, 'Pronob', 'Sarkar', 'pronobs946@gmail.com', '0', 'e0eac1404d1e81e36e1e948f9f3208dc63265ea5', '2021-04-30', 'Active', 'User', 'bab37c3a97c3a2f33d207a40b0fcf21eae00880716197738353317', 'Dhaka BD', 'uploads/Pronob_Kumer_Sarkar.jpg', '', 'pronobs946', '', 0, 0, 'I am a freelance image editing and photographic retoucher with experience in studio photography, image manipulation, photo retouching, composition, photo restoration, image clipping/masking, and photograph color correction using Adobe Photoshop CC.\r\n\r\nOffering a skilled photographic and digital photo retouching service tailored perfectly to your own needs, I aim to provide that essential support within your workflow that prepares your image for publication online or in print media.\r\n\r\nI have studied at Graphics Design technology degree level and six years of industry experience of photographic post-production. I have been involved in numerous projects, working with Graphic Designer and creative directors as part of their workflow.\r\n\r\nI am well-motivated and conscientious, with a keen eye for detail, and thoroughly enjoy working with all imagery. ', '', 3, 364, '', 'Photo retouching, photo manipulation, photo editing, background removal, clipping path ', '20', ' Photo Editing, Photo Retouching, Photo Restoration, Photography, Image Processing', 'Professional Photo Retoucher and Photoshop expert. Delivered Post Production Services all Over the world', 'English ', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '', ''),
(151, 'J', 'A', 'jeetviramgama@gmail.com', '0', 'e4fa1a94ac9ea09b9b024ddd4164337fe7ae60fd', '2021-04-30', 'Active', 'User', 'af1213e31341321ce62196f55eac0d9c62581f1f16197782028455', 'Surat IN', 'assets/images/dp.png', '', 'jeetviramgama', '', 0, 0, '', '', 1, 314, '', 'Front-end developer ', '10', ' Javascript, CSS3, HTML5, React.js', 'Front end web developer', 'Javascript', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '', ''),
(152, 'Vatsal', 'Raychura', 'vats.raichura@gmail.com', '0', '881ed7460b7fcea8816a287cfe61134e59f28cf9', '2021-04-30', 'Active', 'User', '8914a3fcde09760f31ad1779f242371670d77a7116197816225906', 'Ahmedabad IN', 'uploads/vatsal.1326dfba.png', '', 'vats.raichura', '', 0, 0, 'Hello,\r\n\r\nGreetings..\r\n\r\nI am Vatsal. I have 3+ years of experience in the IT Industry as an IT and Network Security Specialist. I have worked with many top IT and Security Brands. Also, that I have expertise in Vulnerability Assessment and Penetration Testing (VAPT), Web and Application testing, Network and System testing, Cloud Testing, Blackbox testing, etc. along with vast knowledge of different security standards &amp; compliances like ISO 27001, OWASP, SANS, PCI DSS, HIPPA, GDPR, etc', '', 1, 314, '', 'VAPT,Security,Audit,pentesting,hacking', '25', 'Vulnerability Assessment, Penetration Testing, Compliance, Network Security, Website Testing', 'Cyber Security Professional', 'English,Hindi,Gujarati', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '100', 'assets/All_Icons/Badge-03.png'),
(153, 'Vineet', 'Sadawari', 'myvineetsadawari@gmail.com', '0', '70e1c3c17c9ec84fa0c582d59e9f83e9e848500a', '2021-04-30', 'Active', 'User', '3fefc5d8b4a84816494b54acdf2aa1c86f70712816197833097767', 'M?l IN', 'assets/images/dp.png', '', 'myvineetsadawari', '', 0, 0, '', '', 0, 0, '', '', '', '', NULL, '', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '', ''),
(154, 'Pradeepsinh', 'Bihola', 'pradeepsinhbihola@gmail.com', '0', '998ac6c4d4c4778b9479e0894f463fadf18c4f1c', '2021-04-30', 'InActive', 'Buyer', 'e32509961990bfd40657b48405feb587087a282a16197850271551', 'Pune IN', 'assets/images/dp.png', '', 'pradeepsinhbihola', '', 0, 0, '', '', 0, 0, '', '', '', '', NULL, '', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '', ''),
(155, 'Harry', 'Jin', 'harryjin9@gmail.com', '0', 'ef6a95e18107ed57cbf72a3ce0542a93cff94be0', '2021-04-30', 'InActive', 'User', '5b13c12cbf4af987ed9d549bc337b8d74952cfc516197868316888', 'Khabarovsk RU', 'uploads/harry-jin-45956371.jpg', '', 'harryjin9', '', 0, 0, 'I\'m a strong iOS Developer with 9+ years experience.\r\n- Full Time 40+ hours per week\r\n- Good communication for project\r\n- Update work everyday\r\n- High Quality.\r\n', '', 1, 314, '', 'ios developer', '30', ' iOS Development, Android, Swift, Kotlin', '', 'English', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '100', 'assets/All_Icons/Badge-03.png'),
(156, 'Li', 'DokIl', 'fhrrydeveloper@gmail.com', '0', 'ee1074271229bb0300a9ce5c3917d44d4a24945f', '2021-04-30', 'Active', 'User', 'd59a75598108e5565322a282faedae0439e8393a16197876928720', 'Khabarovsk RU', 'uploads/profile_logo__192_1921.jpg', 'uploads/croppedImg_616785989.png', 'fhrrydeveloper', '188.43.136.32', 0, 0, 'Hi, Employer.\r\nHow are you?\r\nI am a senior Web and Mobile App developer.\r\nI have created lots of projects for my clients of countries on the world.\r\nIf you hire me, you will get great result in short time.\r\nI am sure that\r\nHere are my main skills:\r\nweb skills: react, node, angular, laravel, express, php, css, html, javascript, python, web design,mongodb, mysql and etc\r\napp skills: ionic, react-native', '', 1, 331, '', 'web development,web design,app development,app design,web hosting', '20', ' React.js, node.js, PHP, ES8 Javascript, HTML', 'Full stack Web and Mobile App Developer', 'english', '', '', NULL, '0', '', '', '', '', '', '', '1619790083', 0, NULL, '', '', 'first_name', '', ''),
(157, 'Chirag', 'Agrawal', 'chiragkcv2020@gmail.com', '0', '296f221bf02be6e64e3e7bb2b961acdd8ae86ccf', '2021-05-01', 'Active', 'User', 'e5f3c1127495398e75f03ef474c7dfcd5d7ef9b416198568959587', 'Nagpur IN', 'uploads/cool_pic.jpg', 'uploads/croppedImg_1954272841.png', 'chiragkcv2020', '', 0, 0, 'I do security research in Day time &amp; I do Freelance , Vulnerability Assessment , Penetration testing &amp; Security Checks at Night for companies,\r\nI have experience with working with companies &amp; Also Have Interned in Security Companies.\r\n\r\nAlso I share about Vulnerabilities In My medium profile:\r\nhttps://chirag-agrawal.medium.com/', '', 1, 321, '', 'penetration testing,VAPT,Web Security,Functional testing,OWASP TOP10', '50', 'OWSP TOP10, Penetration Testing, Amazon Web Services, Network Security, Internet Security', 'Hey , I am a security Researcher & Part time Freelancer .', 'python,c,sql,english,react', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '', ''),
(158, 'Chris', 'B', 'brewerspurs@aol.com', '0', '448469098aad61113f2a4b3d25c56e61b5b9bc6f', '2021-05-01', 'Active', 'User', '48cf5e0180c9d6ee189d934e0d5e566c6c0de7bf16198682896599', 'Norwich GB', 'uploads/Profile_pic6.jpg', '', 'brewerspurs', '', 0, 1, '', '', 1, 314, '', 'HTML,CSS,JavaScript,jQuery', '75', ' Frontend Development, Front-end Design', 'Front End Web Developer', 'English', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '', ''),
(159, 'Michelle', 'Ger', 'mikayi@yahoo.com', '0', '309c9290f22c3dd78cd74e4e4ed5607b38a1314d', '2021-05-02', 'Active', 'User', '873f55620e472d15096c2a811b5da299b08d3f4f16199425913007', 'Nairobi KE', 'uploads/Michelle_Pic.jpg', '', 'mikayi', '', 0, 0, 'Dynamic and dedicated worker recognized for communicating effectively at various levels globally.\r\n\r\nProven measurable track record of meeting targets and deadlines.\r\n\r\nEfficient, fast and accurate handling of large volumes of data, high performance in online research to suit customer\'s needs.\r\n\r\nCertified customer support and call management expert ( email outreach inbound &amp; outbound sales,).\r\n\r\nCommitted to exceeding expectations.', '', 4, 369, '', 'Customer Service, Internet Research,Data Entry', '20', '', 'Virtual Assistant / Executive Assistant', 'English, Kiswahili', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '100', 'assets/All_Icons/Badge-03.png'),
(160, 'ILIASU', 'DOLAPO', 'dolapo4atolagbe@gmail.com', '0', '85effb9e11aa224e451356cb624bfdd009eada6c', '2021-05-03', 'Active', 'Buyer', 'a10fea326b82cd1ec414c9dd8391760947cc084116200068489465', 'Lagos NG', 'assets/images/dp.png', '', 'dolapo4atolagbe', '', 0, 0, '', '', 0, 0, '', '', '', '', NULL, '', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '', ''),
(161, 'MAHMOOD', 'SAEED', 'mahmoodsaeed1980@gmail.com', '0', 'f17a051dcf2bf76f09721b1f531044c558da4ef7', '2021-05-03', 'Active', 'User', '48ab53ca1886489508b30950e487c7f1955d163e16200251368695', 'Gujranwala PK', 'assets/images/dp.png', '', 'mahmoodsaeed1980', '', 0, 0, '', '', 0, 0, '', '', '', '', NULL, '', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '100', 'assets/All_Icons/Badge-03.png'),
(162, 'Waqas', 'Hassan', 'waqashassan100@gmail.com', '0', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2021-05-03', 'InActive', 'User', '4279fbc1b26105613b403abf69b341315dcd560f16200283142139', 'Rawalpindi PK', 'assets/images/dp.png', '', 'waqashassan100', '', 0, 0, '', '', 0, 0, '', '', '', '', NULL, '', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '', ''),
(163, 'Xavier', 'Rigoulet', 'xavier.rigoulet@gmail.com', '0', '97b58a6509ff3bb40c94307ff1826a8fe790572f', '2021-05-05', 'Active', 'User', '1944b9d3705175da51492b7318e03e1b0cbf489c16202056004707', 'Singapore SG', 'uploads/profilePic.jpeg', '', 'xavier.rigoulet', '', 0, 0, '- Build data analytics reports and dashboards\r\n- Build predictive models with the use of Machine Learning and Deep Learning techniques.\r\n- Provide insights on data-driven decision making.\r\n- Build chatbots and conversational AI.\r\n- Build face recognition and object detection applications with the use of computer vision technologies.\r\n- Deployment of artificial intelligence solutions\r\n- Deployment of data analytics solutions\r\n- Data Collection using Web-Scraping techniques', '', 1, 325, '', 'Data Science,Machine Learning,Deep Learning,Artificial Intelligence,Python', '28', 'Python, Machine Learning (ML), Data Analytics, Data Visualization, Artificial Intelligence', 'Data Scientist - Machine Learning Engineer - Python', 'French,English,Mandarin,Indonesian', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '', ''),
(164, 'Peris', 'Githu', 'perisw204@gmail.com', '0', '291bcb5387dce08d01e25629225bf566cdce15b7', '2021-05-08', 'Active', 'User', 'cc9552afdb7d1796d581002bad2105f53ed9638216204881779248', 'Nairobi KE', 'uploads/new_pic_1.jpg', 'uploads/croppedImg_1197004506.jpeg', 'perisw204', '', 0, 0, 'I am an Experienced Customer Enthusiast that is ready to deliver diamond-level service to your valuable customers. I have a Higher Diploma in IT. With 15+ years of experience resolving complex customer inquiries, passionately driving brand loyalty, building strong customer relationships, and increasing customer engagement in different industries, you can rest assured that your clients are in safe hands.\r\n\r\nAdditionally, I am a Content Writer for websites and blogs. Having been a writer for two and a half years, I can deliver premium quality, well-researched, plagiarism-free, crafted stories, and content that adheres to SEO standards within agreed timelines.\r\n\r\nI am a fulltime freelancer. Customer Satisfaction is my priority!! Reach out, and let us start.', '', 4, 369, '', 'Customer Service,Content Writer,Data Entry,Technical Support,Customer Success', '20', ' Customer Support, Customer Experience, Customer Retention, Blog Writing, Article Writing', 'Freelance Customer Service & Article Writer Champion And ', 'English,Swahili', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '100', 'assets/All_Icons/Badge-03.png'),
(165, 'Parth', 'Bhatti', 'parthbhatti1995@gmail.com', '0', '0b8cc8220412b1e1fc6aa2004121ebcad1404fe1', '2021-05-09', 'InActive', 'User', '35acd0f7c18d1fd2e71803bd279eb9de5279ed1716205381298893', 'R?jkot IN', 'uploads/parth-dp_(2).png', '', 'parthbhatti1995', '', 0, 0, '', '', 1, 325, '', 'android,android application developement ', '40', ' Java, Android', 'Android Developer', 'java,kotlin', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '', ''),
(166, 'Unwana', 'Ita', 'brightita@gmail.com', '0', 'daa99f8b651d38aa972d6afb1000d1a28c3d758c', '2021-05-09', 'InActive', 'User', '44d6e9507a744419e4e4eb70830fae35c928cefe16205810309953', 'Lagos NG', 'assets/images/dp.png', '', 'brightita', '', 0, 0, '', '', 0, 0, '', '', '', '', NULL, '', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '', ''),
(167, 'Maccos', 'Mutuma', 'maccosmutuma1981@gmail.com', '0', '5deb64774743057e7ee39a75c70ab42e8a2061f2', '2021-05-12', 'Active', 'User', 'f6c2b7ceadf32dfcbcbc34bc4a9990da6624692016207612198262', 'Nairobi KE', 'uploads/IMG_-i88hcw.jpg', '', 'maccosmutuma1981', '', 0, 0, 'Software engineer.\r\nAndroid / iOS / Web.', '', 1, 331, '', '', '8', ' Web Development', '', 'Javascript  && Python', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '', ''),
(168, 'Ashraf', 'Khan', 'AshuBacha432@gmail.com', '0', '1f1512f6c9b0079e4fc98f0470007410ce9eac0e', '2021-05-13', 'InActive', 'User', 'f7f6b64fcb474f7b18e929bb948d1afa25f1d20416208598866377', 'Karachi PK', 'assets/images/dp.png', '', 'AshuBacha432', '', 0, 0, 'Hello! I am a content writer, web and mobile apps developer with 3+ years of vast experience in Writing and developing Mobile and Web Apps(Without coding). I am an excellent team player with the ability to perform independently. I also assemble deadlines and provide great quality work at a quick turnaround time. As a web developer, I am an expert in CMS like Wix, WordPress, Shopify, and Bubli.io, etc. In mobile app development and designing, I work on Figma and adobe Xd for designing, and for development, I prefer Appypie and andromo. In content writing services I am providing services to write articles, web content writing, and SEO content writing. Just once visit with me to see how your innovative ideas can transform into reality. Provide me an opportunity to express how I can make innovation in your business.\r\nplease content me without hesitation!', '', 1, 331, '', 'content writer,mobile app testing,website developer,mobile app developer,ui ux designer', '5', ' Content Writing, Mobile App Development, Mobile App Testing,website development,ui ux designer', 'Writer + developer', 'English,Urdu,Punjabi,Hindi', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '', ''),
(169, 'Ada', 'Kibet', 'adakibetj@protonmail.com', '0', 'faa49d0ccc197f867520bd5a88c0a366baf3f62f', '2021-05-15', 'Active', 'User', 'd34a52632fb3ec1043e988b63fbd5b127c393a7316210661809892', 'Nairobi KE', 'uploads/IMG_20210324_084957_148.jpg', '', 'adakibetj', '', 0, 0, 'check out a few projects: https://sites.google.com/10academy.org/10-academy-batch-3-ada-kibet/portfolio-listing?authuser=0\r\n\r\nLinkedIn: https://www.linkedin.com/in/ada-kibet-877338189/\r\n\r\n', '', 1, 323, '', 'Data Science,Machine Learning\',Conversational AI,Web Development,Statistical Modeling', '16', ' Data Science, Web Scraping, Machine Learning (ML), Deep Learning, Natural Language', 'Data Scientist', 'python,R', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '', ''),
(170, 'Lakh', 'Bhakar', 'lakh.bhakar@vibraniumconsulting.co.uk', '0', '29a64a46cea73a6468fc1c2c5ab012ca4383d161', '2021-05-15', 'InActive', 'User', '5ac8f139cf91f98d25986427bb19716e90cce20016210893418502', 'City of London GB', 'assets/images/dp.png', '', 'lakh.bhakar', '', 0, 0, '', '', 0, 0, '', '', '', '', NULL, '', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '', ''),
(171, 'Ryan', 'Devine', 'info@ryandevine.co.uk', '0', '96e62b5c9fb35c04b93f019a5979e2e1def5ee7d', '2021-05-17', 'Active', 'User', '64d18db76857c48754299b7e2eff8f9067b6c8fb16212416431284', 'Bedford GB', 'uploads/Screenshot_2020-08-10_at_15.30.45.png', 'uploads/croppedImg_64917734.jpeg', 'info', '', 0, 0, 'Filmmaker based in Bedfordshire and covering the UK, and for the right project, worldwide.\r\n\r\nServices include but not limited to: \r\n\r\n- Drone video/photo\r\n- Corporate video solutions \r\n- Event videography\r\n- Business Promos\r\n- Editing services (including stock footage edits)\r\n- Cinematic storytelling \r\n- Script writing services\r\n- Photography  \r\n\r\ninfo@ryandevine.co.uk\r\nwww.ryandevine.co.uk\r\nwww.twitter.com/RyanDevineFilm\r\nwww.linkedin.com/in/ryan-devine-film/   \r\nwww.instagram.com/ryandevine.co.uk/', '', 3, 368, '', 'Videography,Video services,videographer,filmmaker,drone', '99', ' Video Editing,videographer, Digital Marketing, Social Media Marketing, Drone Photography', 'Videographer, Filmmaker & Photographer', 'English', '', '', NULL, '0', '', '', '', '', '', '', '', 0, NULL, '', '', 'full_name', '', ''),
(172, 'Mus', 'Tolich', 'mustolich5@gmail.com', '0', '4e3414f36b6c333406965cf6c642b3b2376134ba', '2021-05-19', 'Active', 'User', 'd401afeee4b0b740bf8414232b578b163555197416213900515664', 'Depok ID', 'uploads/profil.png', 'uploads/croppedImg_511639228.png', 'mustolich5', '182.2.42.243', 0, 0, 'Hi,\r\nNice to meet you, I am a professional Graphic Designer freelancer from Indonesia with experience since 2014, spending most of my time in the design field.\r\nIf you need design work\r\nI\'m happy to be ready to help you with all your graphic design needs, with unique &amp; creative ideas for the success of your business! quality and satisfaction is our priority,\r\nenjoy my work', '', 3, 351, '', 'vector,logo,illustration,flyer,vector tracing', '30', ' Graphic Design, Corel Draw, Adobe Illustrator, Photo Editing, Vectorization', 'graphic design', 'indonesia,arab,English', '', '', NULL, '0', '', 'mustolich5@gmail.com', '', '', '', '', '1621532173', 0, NULL, '', '', 'first_name', '100', 'assets/All_Icons/Badge-03.png');

-- --------------------------------------------------------

--
-- Table structure for table `users_wishlist`
--

CREATE TABLE `users_wishlist` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `whom_wished` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_certs`
--

CREATE TABLE `user_certs` (
  `cert_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `cert_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_certs`
--

INSERT INTO `user_certs` (`cert_id`, `u_id`, `cert_file`) VALUES
(57, 141, 'uploads/Frank_Smith_CV_for_Ben_Jacobs.pdf'),
(58, 143, 'uploads/9ae4264dc66aad37cc0fd37ba19acecb1.png'),
(59, 143, 'uploads/9ed33ebcdef29c95ee6b89bbdc4ce7ba1.jpg'),
(60, 143, 'uploads/f1f82cae1b52f8a0f64e840160db06ca1.jpg'),
(61, 148, 'uploads/Screenshot_from_2019-11-13_10-15-25.png'),
(62, 150, 'uploads/enlarge-breasts-photoshop-mobile_1593513883_wh9601.jpg'),
(67, 159, 'uploads/Qualification_Certs_-_Michelle.pdf'),
(68, 149, 'uploads/Screenshot_from_2021-05-03_12-12-56.png'),
(69, 164, 'uploads/certificate-of-completion-for-seo-writing-masterclass.pdf'),
(70, 163, 'uploads/SOA_Data+Engineering_XAVIER+JEAN+DOMINIQUE+RIGOULET_2021.pdf'),
(71, 168, 'uploads/ACFrOgBFKooNqxKom99DGfRMZTEbiLk9AJ4MarxraaI8gyouJ75hCQNrVsttVHxA87-1hY82IgObZmL-FTYMdnHKr61WA_eaUieVKbsubXOaJ533Ca4pY6newlVoX5P3nsNrrb77njdFyjhguAgS.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user_portfolio`
--

CREATE TABLE `user_portfolio` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `cert_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_portfolio`
--

INSERT INTO `user_portfolio` (`id`, `u_id`, `image`, `cert_file`) VALUES
(61, 143, 'uploads/9ae4264dc66aad37cc0fd37ba19acecb_thumb.png', ''),
(62, 143, 'uploads/9ed33ebcdef29c95ee6b89bbdc4ce7ba_thumb.jpg', ''),
(63, 143, 'uploads/f1f82cae1b52f8a0f64e840160db06ca_thumb.jpg', ''),
(66, 148, 'uploads/vagrant-cert1_thumb.jpg', ''),
(67, 150, 'uploads/image_fixed_width_(8)_thumb.jpg', ''),
(68, 150, 'uploads/image_fixed_width_(7)_thumb.jpg', ''),
(69, 150, 'uploads/image_fixed_width_(6)_thumb.jpg', ''),
(70, 150, 'uploads/image_fixed_width_(5)_thumb.jpg', ''),
(71, 150, 'uploads/image_fixed_width_(4)_thumb.jpg', ''),
(72, 150, 'uploads/image_fixed_width_(3)_thumb.jpg', ''),
(73, 150, 'uploads/image_fixed_width_(2)_thumb.jpg', ''),
(74, 150, 'uploads/image_fixed_width_(1)_thumb.jpg', ''),
(75, 150, 'uploads/image_fixed_width_thumb.jpg', ''),
(76, 150, 'uploads/headshot-retouching-before-after-mob-101610448819_wh960_thumb.jpg', ''),
(77, 150, 'uploads/editing-headshots-before-after-mob-91610448764_wh960_thumb.jpg', ''),
(78, 150, 'uploads/headshot-photo-editor-before-after-mob-71610448701_wh960_thumb.jpg', ''),
(79, 150, 'uploads/retouching-headshots-photos-mobile-71595235571_wh960_thumb.jpg', ''),
(80, 150, 'uploads/enlarge-breasts-photoshop-mobile_1593513883_wh960_thumb.jpg', ''),
(81, 150, 'uploads/clipping-path-outsource-mobile1595857866_wh960_thumb.jpg', ''),
(82, 150, 'uploads/clipping-path-company-mobile1595857673_wh960_thumb.jpg', ''),
(83, 150, 'uploads/20210426_185916_thumb.jpg', ''),
(93, 156, 'uploads/ipmsgclip_s_1601225414_0_thumb.png', ''),
(94, 156, 'uploads/ipmsgclip_s_1601225414_3_thumb.png', ''),
(95, 156, 'uploads/ipmsgclip_s_1601225502_0_thumb.png', ''),
(96, 156, 'uploads/ipmsgclip_s_1601225502_1_thumb.png', ''),
(97, 156, 'uploads/ipmsgclip_s_1601226592_1_thumb.png', ''),
(98, 156, 'uploads/ipmsgclip_s_1601226592_2_thumb.png', ''),
(99, 156, 'uploads/61fa4c_thumb.jpg', ''),
(100, 156, 'uploads/f2af06_thumb.jpg', ''),
(101, 156, 'uploads/ipmsgclip_s_1600616202_0_thumb.png', ''),
(102, 156, 'uploads/ipmsgclip_s_1600616423_1_thumb.png', ''),
(103, 156, 'uploads/ipmsgclip_s_1600616423_21_thumb.png', ''),
(104, 168, 'uploads/profile_picture_thumb.jpg', ''),
(105, 168, 'uploads/Portfolio file (1)_thumb.pdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_rating`
--

CREATE TABLE `user_rating` (
  `rating_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `stars` int(2) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL,
  `is_reply` enum('Yes','No') NOT NULL DEFAULT 'No',
  `who_rated` int(11) NOT NULL,
  `msg_id` int(11) NOT NULL,
  `reply_of` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_rating`
--

INSERT INTO `user_rating` (`rating_id`, `u_id`, `job_id`, `stars`, `comment`, `date`, `is_reply`, `who_rated`, `msg_id`, `reply_of`) VALUES
(18, 158, 33, 5, 'My website looks fantastic, thank you so much', '2021-05-01 12:06:17', 'No', 140, 61, 0),
(19, 140, 33, 5, 'Great client to deal with', '2021-05-01 12:06:53', 'No', 158, 61, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_rights`
--

CREATE TABLE `user_rights` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

CREATE TABLE `withdrawal` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` enum('Approved','Not Approved','Pending','') NOT NULL,
  `amount` text DEFAULT NULL,
  `withdraw_method` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `disputes`
--
ALTER TABLE `disputes`
  ADD PRIMARY KEY (`dsipute_id`);

--
-- Indexes for table `disputes_files`
--
ALTER TABLE `disputes_files`
  ADD PRIMARY KEY (`dispute_detail_id`);

--
-- Indexes for table `doc_recived`
--
ALTER TABLE `doc_recived`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general`
--
ALTER TABLE `general`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `jobs_msgs`
--
ALTER TABLE `jobs_msgs`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `jobs_type`
--
ALTER TABLE `jobs_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs_wishlist`
--
ALTER TABLE `jobs_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_images`
--
ALTER TABLE `job_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_invites`
--
ALTER TABLE `job_invites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_menu`
--
ALTER TABLE `main_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msgs_files`
--
ALTER TABLE `msgs_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`noti_id`);

--
-- Indexes for table `payment_gateway`
--
ALTER TABLE `payment_gateway`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_featured`
--
ALTER TABLE `profile_featured`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposal_credits`
--
ALTER TABLE `proposal_credits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `query_answer`
--
ALTER TABLE `query_answer`
  ADD PRIMARY KEY (`query_ans_id`);

--
-- Indexes for table `query_ans_attachments`
--
ALTER TABLE `query_ans_attachments`
  ADD PRIMARY KEY (`attach_id`);

--
-- Indexes for table `query_attachments`
--
ALTER TABLE `query_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `query_questions`
--
ALTER TABLE `query_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommend_freelancers`
--
ALTER TABLE `recommend_freelancers`
  ADD PRIMARY KEY (`recommend_id`);

--
-- Indexes for table `recommend_offers`
--
ALTER TABLE `recommend_offers`
  ADD PRIMARY KEY (`recommend_id`);

--
-- Indexes for table `security_questions`
--
ALTER TABLE `security_questions`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `services_adons`
--
ALTER TABLE `services_adons`
  ADD PRIMARY KEY (`adonid`);

--
-- Indexes for table `services_featured`
--
ALTER TABLE `services_featured`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_msgs`
--
ALTER TABLE `services_msgs`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `services_purchased`
--
ALTER TABLE `services_purchased`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_views`
--
ALTER TABLE `services_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_wishlist`
--
ALTER TABLE `services_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_msgs_files`
--
ALTER TABLE `service_msgs_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_portfolio`
--
ALTER TABLE `service_portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_rating`
--
ALTER TABLE `service_rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_wishlist`
--
ALTER TABLE `users_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_certs`
--
ALTER TABLE `user_certs`
  ADD PRIMARY KEY (`cert_id`);

--
-- Indexes for table `user_portfolio`
--
ALTER TABLE `user_portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_rating`
--
ALTER TABLE `user_rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `user_rights`
--
ALTER TABLE `user_rights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawal`
--
ALTER TABLE `withdrawal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `badges`
--
ALTER TABLE `badges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=431;

--
-- AUTO_INCREMENT for table `disputes`
--
ALTER TABLE `disputes`
  MODIFY `dsipute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `disputes_files`
--
ALTER TABLE `disputes_files`
  MODIFY `dispute_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doc_recived`
--
ALTER TABLE `doc_recived`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `general`
--
ALTER TABLE `general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `jobs_msgs`
--
ALTER TABLE `jobs_msgs`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `jobs_type`
--
ALTER TABLE `jobs_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jobs_wishlist`
--
ALTER TABLE `jobs_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `job_images`
--
ALTER TABLE `job_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `job_invites`
--
ALTER TABLE `job_invites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `main_menu`
--
ALTER TABLE `main_menu`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `msgs_files`
--
ALTER TABLE `msgs_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `noti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `payment_gateway`
--
ALTER TABLE `payment_gateway`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profile_featured`
--
ALTER TABLE `profile_featured`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `proposal_credits`
--
ALTER TABLE `proposal_credits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `query_answer`
--
ALTER TABLE `query_answer`
  MODIFY `query_ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `query_ans_attachments`
--
ALTER TABLE `query_ans_attachments`
  MODIFY `attach_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `query_attachments`
--
ALTER TABLE `query_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `query_questions`
--
ALTER TABLE `query_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rank`
--
ALTER TABLE `rank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `recommend_freelancers`
--
ALTER TABLE `recommend_freelancers`
  MODIFY `recommend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `recommend_offers`
--
ALTER TABLE `recommend_offers`
  MODIFY `recommend_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `security_questions`
--
ALTER TABLE `security_questions`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `services_adons`
--
ALTER TABLE `services_adons`
  MODIFY `adonid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `services_featured`
--
ALTER TABLE `services_featured`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services_msgs`
--
ALTER TABLE `services_msgs`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `services_purchased`
--
ALTER TABLE `services_purchased`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services_views`
--
ALTER TABLE `services_views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `services_wishlist`
--
ALTER TABLE `services_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `service_msgs_files`
--
ALTER TABLE `service_msgs_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_portfolio`
--
ALTER TABLE `service_portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `service_rating`
--
ALTER TABLE `service_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1677;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `users_wishlist`
--
ALTER TABLE `users_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_certs`
--
ALTER TABLE `user_certs`
  MODIFY `cert_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `user_portfolio`
--
ALTER TABLE `user_portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `user_rating`
--
ALTER TABLE `user_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_rights`
--
ALTER TABLE `user_rights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
