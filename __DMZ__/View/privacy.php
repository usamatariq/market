<?php
	session_start();
	// ini_set('display_errors','1'); 
	// error_reporting(E_ALL);
	// var_dump($_SESSION);
	
	if(!isset($_SESSION['username'])) {
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Danceseen - Jobs</title>
	<?php
		require_once("View/head.php");
	?>
</head>

<body>
	<?php
		require_once("View/userHeader.php");
		include("Model/Job.php");
		$job = new Job();
	?>
	
	<div class="container home-tab" style="margin-top:20px;">
		<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default panel-body" style="text-align:justify;">
		<h1>Privacy Policy</h1>
        <p>Last Updated: April 7, 2014</p>

		<p><b><u>AIRBNB PRIVACY POLICY</B></U></p>

		<p>Airbnb (hereinafter referred to as "<b>Airbnb</b>", "<b>we</b>", "<b>us</b>" or "<b>our</b>") operates a platform and community marketplace that helps people form lasting offline experiences and relationships directly with one another, where they can create, list, discover and book unique accommodations around the world, whether through our website or our mobile applications (“<b>Platform</b>”). Airbnb refers to Airbnb Inc. if you reside in the USA, and to Airbnb Ireland if you reside outside of the USA.</p>

		<p>This Privacy Policy is intended to inform you about how we treat Personal Information that we process about you. If you do not agree to any part of this Privacy Policy, then we cannot provide the Platform to you, and you should stop accessing the Platform and deactivate your Airbnb account.  You can find out more about how to deactivate your Airbnb account at <a href="http://www.airbnb.com/help" target="_blank">http://www.airbnb.com/help</a>.</p>

		<p><b><u>DEFINITIONS</b></u></p>

		<p>Where the definition of a term does not appear in this Privacy Policy (such as “Listing”, “Accommodation”, “Content” etc.), it shall be given its definition as outlined in our Terms of Service (<a href="http://www.airbnb.com/terms" target="_blank">http://www.airbnb.com/terms</a>). </p>

		<p>“<b>Aggregated information</b>” means information about all of our users or specific groups or categories of users that we combine together and which does not include the users’ Personal Information.</p>

		<p>"<b>Data Controller</b>" means Airbnb, the company responsible for the use of and processing of Personal Information.</p>

		<p>"<b>Personal Information</b>" means information relating to a living individual who is or can be identified either from that information or from that information in conjunction with other information that is in, or is likely to come into, the possession of the Data Controller.</p>

		<p><b><u>WHAT TYPES OF INFORMATION DOES AIRBNB GATHER ABOUT ITS USERS?</b></u></p>

		<p><b>1.	Information that you give us</b></p>

		<p>We receive, store and process information that you make available to us when accessing or using our Platform. Examples include when you:
		<br /><ol>
		<br /><li>	fill in any form on the Platform, such as when you register or update the details of your user account;</li>
		<br /><li>	access or use the Platform, such as to search for or post Accommodations, make or accept bookings, pay for Accommodations, book or pay for any associated services that may be available (such as but not limited to cleaning), post comments or reviews, or communicate with other users;</li>
		<br /><li>	link your account on a third party site (e.g. Facebook) to your Airbnb account, in which case we will obtain the Personal Information that you have provided to the third party site, to the extent allowed by your settings with the third party site and authorized by you; and</li>
		<br /><li>	communicate with Airbnb.</li>
		<br /></ol></p>

		<p><b>2.	Mobile Data</b></p>

		<p>When you use certain features of the Platform, in particular our mobile applications we may receive, store and process different types of information about your location, including general information (e.g., IP address, zip code) and more specific information (e.g., GPS-based functionality on mobile devices used to access the Platform or specific features of the platform).  If you access the Platform through a mobile device and you do not want your device to provide us with location-tracking information, you can disable the GPS or other location-tracking functions on your device, provided your device allows you to do this.  See your device manufacturer’s instructions for further details. </p>

		<p><b>3.	Log Data</b></p>

		<p>We may also receive, store and process Log Data, which is information that is automatically recorded by our servers whenever you access or use the Platform, regardless of whether you are registered with Airbnb or logged in to your Airbnb account, such as your IP Address, the date and time you access or use the Platform, the hardware and software you are using, referring and exit pages and URLs, the number of clicks, pages viewed and the order of those pages, and the amount of time spent on particular pages.</p>

		<p><b>4.	Cookies, and other Tracking Technologies</b></p>

		<p>Airbnb uses cookies and other similar technologies on the Platform. We may also allow our business partners to use their cookies and other tracking technologies on the Platform. As a result, when you access or use the Platform, you will provide or make available certain information to us and to our business partners.</p>

		<p>While you may disable the usage of cookies through your browser settings, we do not change our practices in response to a “Do Not Track” signal in the HTTP header from your browser or mobile application.  We track your activities if you click on advertisements for Airbnb services on third party platforms such as search engines and social networks, and may use analytics to track what you do in response to those advertisements. </p>

		<p>We may, either directly or through third party companies and individuals we engage to provide services to us, also continue to track your behavior on our own Platform for purposes of our own customer support, analytics, research, product development, fraud prevention, risk assessment, regulatory compliance, investigation, as well as to enable you to use and access the Platform and pay for your activities on the Platform.   We may also, either directly or through third party companies and individuals we engage to provide services to us, track your behavior on our own Platform to market and advertise our services to you on the Platform and third party websites. Third parties that use cookies and other tracking technologies to deliver targeted advertisements on our Platform and/or third party websites may offer you a way to prevent such targeted advertisements by opting-out at the websites of industry groups such as the Network Advertising Initiative (<a href="http://www.networkadvertising.org/choices/" target="_blank">http://www.networkadvertising.org/choices/</a>) and/or the Digital Advertising Alliance (<a href="http://www.aboutads.info/choices/" target="_blank">http://www.aboutads.info/choices/</a>).  You may also be able to control advertising cookies provided by publishers, for example Google’s Ad Preference Manager (<a href="https://www.google.com/settings/ads/onweb/" target="_blank">https://www.google.com/settings/ads/onweb/</a>). Please note that even if you choose to opt-out of receiving targeted advertising, you may still receive advertising on the Platform – it just will not be tailored to your interests. </p>

		<p>Third parties may not collect information about users’ online activities on the Platform except as described in this policy and our <a href="#cookie_policy">Cookie Policy</a>. </p>

		<p><b>5.	Third-party social plugins</b></p>

		<p>Our Platform may use social plugins which are provided and operated by third-party companies, such as Facebook’s Like Button. </p>

		<p>As a result of this, you may send to the third-party company the information that you are viewing on a certain part of our Platform. If you are not logged into your account with the third-party company, then the third party may not know your identity. If you are logged into your account with the third-party company, then the third party may be able to link information about your visit to our Platform to your account with them. Similarly, your interactions with the social plugin may be recorded by the third party.</p>

		<p>Please refer to the third party’s privacy policy to find out more about its data practices, such as what data is collected about you and how the third party uses such data.</p>

		<p><b><u>HOW AIRBNB USES AND PROCESSES THE INFORMATION THAT YOU PROVIDE OR MAKE AVAILABLE</u></b></p>

		<p>We use and process Information about you for the following general purposes:
		<br /><ol>
		<br /><li>	to enable you to access and use the Platform;</li>
		<br /><li>	to operate, protect, improve and optimize the Platform, Airbnb’s business, and our users’ experience, such as to perform analytics, conduct research, and for advertising and marketing;</li>
		<br /><li>	to help create and maintain a trusted and safer environment on the Platform, such as fraud detection and prevention, conducting investigations and risk assessments, verifying the address of your listings, verifying any identifications provided by you, and conducting checks against databases such as public government databases; </li>
		<br /><li>	to send you service, support and administrative messages, reminders, technical notices, updates, security alerts, and information requested by you;</li>
		<br /><li>	where we have your consent, to send you marketing and promotional messages and other information that may be of interest to you, including information sent on behalf of our business partners that we think you may find interesting. You will be able to unsubscribe or opt-out from receiving these communications in your settings (in the “Account” section) when you login to your Airbnb account;</li>
		<br /><li>	to administer rewards, surveys, sweepstakes, contests, or other promotional activities or events sponsored or managed by Airbnb or our business partners; and</li>
		<br /><li>	to comply with our legal obligations, resolve any disputes that we may have with any of our users, and enforce our agreements with third parties.</li>
		<br /></ol>	</p>

		<p><b><u>HOW AIRBNB USES AND PROCESSES USER COMMUNICATIONS</u></b></p>

		<p>We may review, scan, or analyze your communications with other users exchanged via the Platform for fraud prevention, risk assessment, regulatory compliance, investigation, product development, research and customer support purposes.  For example, as part of our fraud prevention efforts, the Platform may scan and analyze messages to mask contact information and references to other websites.  This helps to prevent fraudulent actors from asking Guests to send them money outside of the Platform, such as by bank transfer or other money transfer methods.   We may also scan, review or analyze messages for research and product development purposes to help make search, booking and user communications more efficient and effective, as well as to debug product offerings.
		<br /> 
		<br />We will not review, scan, or analyze your communications for sending third party marketing messages to you. We will also not sell these reviews or analyses of communications to third parties. We will also use automated methods to carry out these reviews or analyses where reasonably possible. However, from time to time we may have to manually review some communications.  By using the Platform, you consent that Airbnb, in its sole discretion, may review, scan, analyze, and store your communications, whether done manually or through automated means.</p>

		<p><b><u>WHEN AIRBNB DISCLOSES OR SHARES PERSONAL INFORMATION, AND TO WHOM</u></b></p>

		<p><b>IMPORTANT: When you use the Platform, your data may be sent to the United States and possibly other countries</b></p>

		<p>We may transfer, store, use and process your information, including any Personal Information, to countries outside of the European Economic Area ("<b>EEA</b>") including the United States. Please note that laws vary from jurisdiction to jurisdiction, and so the privacy laws applicable to the places where your information is transferred to or stored, used or processed in, may be different from the privacy laws applicable to the place where you are resident. </p>

		<p>If you are located in the EEA or in Switzerland, please also see our Safe Harbor Notice (<a href="http://www.airbnb.com/terms/safe_harbor_notice" target="_blank">http://www.airbnb.com/terms/safe_harbor_notice</a>).</p>

		<p>Your Personal Information may be disclosed as follows:
		<br /><ol>
		<br /><li>	Parts of your public profile page that contain some Personal Information may be displayed in other parts of the Platform to other users for marketing purposes.</li></p>

		<p><li>	Your public Listing page will always include some minimum information such as the city and neighborhood where the Accommodation is located, your public profile photo and your responsiveness in replying to Guests’ queries. Parts of your public Listing page may be displayed in other parts of the Platform to other users for marketing purposes.   The Platform may also display the Accommodation’s approximate geographic location on a map, such that a user can see the general area of the Accommodation.</li></p>

		<p><li>	The Platform allows your public profile and public Listing pages to be included in search engines, in which case your public profile and public Listing pages will be indexed by search engines and may be published as search results. This option is enabled by default, and you may opt out of this feature by changing your settings on the Platform. If you change your settings or the information on your public profile or public Listing pages, third-party search engines may not update their databases quickly or at all. We do not control the practices of third-party search engines, and they may use caches containing outdated information, including any information indexed by the search engine before you change your settings or the information on your public profile or public Listing pages.</li></p>

		<p><li>	When you submit a request to book an Accommodation, your full name will become visible to the Host. In addition, if you agree to be contacted by the Host by phone when submitting your request and the Host decides to do so, Airbnb will call your phone number first, before connecting you with the Host. We will not share your phone number unless there is a confirmed booking.</li></p>

		<p><li>	When your request to book an Accommodation is accepted by the Host or when you accept a Guest’s request to book your Accommodation, we will disclose some of your Personal Information to the Host or Guest. However, your billing information will never be shared with another user.</li></p>

		<p><li>	When a Guest stays at your Accommodation or when you stay at a Host’s Accommodation, we will ask you to review the Guest or the Accommodation. If you choose to provide a review, your review may be public on the Platform.</li></p>

		<p><li>	You may link your account on a third party social networking site to your Airbnb account. We refer to a person’s contacts on these third party sites as “Friends”. When you create this linkage:
		<br /><ul>
		<br /><li>	some of the information you provide to us from the linking of your accounts may be published on your Airbnb account profile;</li>
		<br /><li>	your activities on the Platform may be displayed to your Friends on the Platform and/or that third party site;</li>
		<br /><li>	other Airbnb users may be able to see any common Friends that you may have with them, or that you are a Friend of their Friend if applicable;</li>
		<br /><li>	other Airbnb users may be able to see any schools, hometowns or other groups you have in common with them as listed on your linked social networking site(s); and </li>
		<br /><li>	the information you provide to us from the linking of your accounts may be stored, processed and transmitted for fraud prevention and risk assessment purposes.</li>
		<br /></ul>
		<br />The publication and display of information that you provide to Airbnb through this linkage is subject to your settings and authorizations on the Platform and the third party site.</li></p>

		<p><li>	We may distribute parts of the Platform (including your Listing) for display on sites operated by Airbnb’s business partners, using technologies such as HTML widgets. If and when your Listings are displayed on a partner’s site, information from your public profile page may also be displayed.</li></p>

		<p><li>	We may allow our related entities such as our subsidiaries, and their employees, to use and process your Personal Information in the same way and to the same extent that we are permitted to under this Privacy Policy.  These related entities comply with the same obligations that we have to protect your Personal Information under this Privacy Policy. </li></p>

		<p><li>	We may also engage third party companies and individuals, who may be located outside of the EEA, to provide services to us, including services to help verify your identification or to conduct checks against databases such as public government databases (where legally allowed). We may provide Personal Information about you to these third parties, or give them access to this Personal Information, for the limited purpose of allowing them to provide these services. We will ensure that such third parties have contractual obligations to protect this Personal Information and to not use it for unrelated purposes. </li></p>

		<p><li>	You acknowledge, consent and agree that Airbnb may access, preserve and disclose your account information and Collective Content if required to do so by law or in a good faith belief that such access, preservation or disclosure is reasonably necessary to (a) respond to claims asserted against Airbnb; (b) to comply with legal process (for example, subpoenas and warrants); (c) to enforce and administer our agreements with users, such as the Terms of Service, (<a href="http://www.airbnb.com/terms" target="_blank">http://www.airbnb.com/terms</a>) and the Host Guarantee Terms and Conditions (<a href="http://www.airbnb.com/terms/host_guarantee" target="_blank">http://www.airbnb.com/terms/host_guarantee</a>); (d) for fraud prevention, risk assessment, investigation, customer support, product development and de-bugging purposes; or (e) to protect the rights, property or personal safety of Airbnb, its users or members of the public.   We will use commercially reasonable efforts to notify users about law enforcement requests for their data unless prohibited by law or by the government request, or if doing so would be futile or ineffective.</li>
		<br /></ol></p>

		<p>We may also publish, disclose and use Aggregated Information and non-personal information for industry analysis, demographic profiling, marketing and advertising, and other business purposes. </p>

		<p><b><u>BUSINESS TRANSFERS BY AIRBNB</u></b></p>

		<p>If Airbnb undertakes or is involved in any merger, acquisition, reorganization, sale of assets or bankruptcy or insolvency event, then we may sell, transfer or share some or all of our assets, including your Personal Information.  In this event, we will notify you before your Personal Information is transferred and becomes subject to a different privacy policy. </p>

		<p><b><u>HOW TO CHANGE OR DELETE YOUR INFORMATION, OR CANCEL YOUR AIRBNB ACCOUNT</u></b></p>

		<p>You may review, update, correct or delete the Personal Information in your Airbnb account by logging in to your account. If you would like to cancel your Airbnb account entirely, you can do so by logging in to your account. Please also note that any reviews, forum postings and similar materials posted by you may continue to be publicly available on the Platform in association with your first name, even after your Airbnb account is cancelled.</p>

		<p><b><u>KEEPING YOUR PERSONAL INFORMATION SECURE</u></b></p>

		<p>We have implemented reasonable administrative, technical, and physical security measures to protect your Personal Information against the unauthorized access, destruction or alteration of your information.  However, no method of transmission over the Internet, and no method of storing electronic information, can be 100% secure. So, we cannot guarantee the absolute security of your transmissions to us and of your Personal Information that we store. </p>

		<p><b><u>YOUR PRIVACY WHEN YOU ACCESS THIRD-PARTY WEBSITES AND RESOURCES</u></b></p>

		<p>The Platform will contain links to other websites not owned or controlled by Airbnb. Airbnb does not have any control over third party websites. These other websites may place their own cookies, web beacons or other files on your device, or collect and solicit Personal Information from you. They will have their own rules about the collection, use and disclosure of Personal Information. We encourage you to read the terms of use and privacy policies of the other websites that you visit.</p>

		<p>Some portions of the Platform implement Google Maps/Earth mapping services, including Google Maps API(s). Your use of Google Maps/Earth is subject to Google’s terms of use (located at <a href="http://www.google.com/intl/en_us/help/terms_maps.html" target="_blank">http://www.google.com/intl/en_us/help/terms_maps.html</a>) and Google’s privacy policy (located at <a href="http://www.google.com/privacy.html" target="_blank">http://www.google.com/privacy.html</a>), as may be amended by Google from time to time.</p>

		<p><b><u>SPECIAL FEATURES AND PROGRAMS</u></b></p>

		<p><b>Referral service and requesting for references</b></p>

		<p>The Platform provides a referral service that allows you to invite your friends and contacts to use the Platform. The Platform also allows you to ask your friends and contacts to write a reference for you, to be published on your Airbnb profile.</p>

		<p>We may integrate the Platform with third party sites such as Facebook, so that you can send invitation messages or requests for references via the third party site itself. These messages will be sent by the third party site, and Airbnb does not collect or retain the contact information that is used to send them.</p>

		<p>You may also send invitation/request emails via the Platform itself, in which case we will ask you for the email addresses to send these emails to. You can type in the email addresses manually, or you can request Airbnb to import the contacts in your email account address book(s). In both cases, we will use the information sent to us for the sole purpose of sending your friends and contacts a one-time email, inviting him or her to visit the Platform or to write a reference for you.   With respect to referrals, we will also store the email addresses of your invitees to track if your friend joins Airbnb in response to your referral.</p>

		<p>If you request us to import your contacts, we will collect, but not store, the username and password for the email account you wish to import your contacts from. We will use this information only for the purpose of importing your contacts.</p>

		<p><b>Affiliate Program</b></p>

		<p>If you are allowed to join Airbnb’s Affiliate Program (see <a href="http://www.airbnb.com/affiliates" target="_blank">http://www.airbnb.com/affiliates</a>) and you sign up for it, you will have to provide us with certain Personal Information to enable us to provide the Affiliate Program to you. </p>

		<p><b>Meetups</b></p>

		<p>The Platform may allow registered account holders to organize, search for or participate in offline events (“<b>Meetups</b>”) in selected cities.</p>

		<p>If you organize a Meetup or indicate that you will attend one, this information, together with some of your public information (such as your profile picture and public profile page) and any messages that you post about that Meetup, will be visible to users who browse the event. However, Airbnb will never disclose where you are staying to another user.</p>

		<p><b>Groups</b></p>

		<p>The Platform may allow registered account holders to participate in online discussion forums ("<b>Group(s)</b>”) in selected cities. </p>

		<p>If you join a Group, then your membership in the Group as well as some of your public information (such as your profile picture and public profile page) will be visible to users who browse the Group. If you publish postings in a Group, then your postings will be visible to such users as well. The ability to browse the Group will depend on the Group settings, and it may or may not be limited to members of that Group.</p>

		<p><b><u>CHANGES TO THIS PRIVACY POLICY</u></b></p>

		<p>We may change how we collect and then use Personal Information at any time and without prior notice, at our sole discretion.
		<br />   
		<br />We may change this Privacy Policy at any time. If we make material changes to the Privacy Policy, we will notify you either by posting the changed Privacy Policy on the Platform or by sending an email to you.  We will also update the “Last Updated Date” at the top of this Privacy Policy.  If we let you know of changes through an email communication, then the date on which we send the email will be deemed to be the date of your receipt of that email.</p>

		<p>It’s important that you review the changed Privacy Policy. If you do not wish to agree to the changed Privacy Policy, then we will not be able to continue providing the Platform to you, and your only option will be to stop accessing the Platform and deactivate your Airbnb account.  You can find out more about how to deactivate your Airbnb account at <a href="http://www.airbnb.com/help" target="_blank">http://www.airbnb.com/help</a>.</p>

		<p><b><u>GOT FEEDBACK?</u></b></p>

		<p>Your opinion matters to us! If you’d like to provide feedback to us about this Privacy Policy, please email us at <a href="mailto:terms@airbnb.com" target="_blank">terms@airbnb.com</a>.</p>

		<p><b><u>FOR USERS RESIDING IN THE EU ONLY: YOUR RIGHTS TO REVIEW AND UPDATE INFORMATION</u></b></p>

		<p>If you reside in the EU, you may request in writing copies of your Personal Information held by us.  We will provide you with a copy of the Personal Information held by us as soon as practicable and in any event not more than 40 days after the request in writing.  There may be a charge to access your personal data (which will not exceed €6.35 in Ireland and £10 in the United Kingdom).  We may also request proof of identification to verify your access request.  All requests should be addressed to our Data Protection Compliance Officer, Airbnb Ireland, Watermarque Building, South Lotts Road, Ringsend, Dublin 4, Ireland. </p>

		<p>We endeavor to keep your information accurate, complete and up to date.  If your Personal Information that we hold is inaccurate, please let us know and we will make the necessary amendments, erase or block the relevant information and notify you within 40 days of your request that the relevant action has been taken.  </p>

		<p>You may also request the erasure of your personal data if you believe we are otherwise in breach of relevant data protection legislation.  All requests should be addressed to our Data Protection Compliance Officer, Airbnb Ireland, Watermarque Building, South Lotts Road, Ringsend, Dublin 4, Ireland.  There is no charge for making such a request.  </p>

		<p><a name="cookie_policy"><b><u>COOKIE POLICY</u></b></a></p>

		<p>Airbnb uses "cookies" in conjunction with the Platform to obtain information. A cookie is a small data file that is transferred to your device (e.g., your phone or your computer) for record-keeping purposes. For example, a cookie could allow the Platform to recognize your browser, while another could store your preferences and other information.</p>

		<p>Your browser may allow you to set how it handles cookies, such as declining all cookies or prompting you to decide whether to accept each cookie.  But please note that some parts of the Platform may not work as intended or may not work at all without cookies.</p>

		<p><b>Airbnb cookies and third party cookies</b></p>

		<p>Airbnb may place our cookies on your device via the Platform. Accordingly, our Privacy Policy will apply to our treatment of the information we obtain via our cookies.</p>

		<p>We may also allow our business partners to place cookies on your device. For example, we use Google Analytics for web analytics, and so Google may also set cookies on your device.   As further explained below, third parties may also place cookies on your device for advertising purposes.</p>

		<p>There are two types of cookies used on the Platform, namely “<b>persistent cookies</b>” and “<b>session cookies</b>”. </p>

		<p>Session cookies will normally expire when you close your browser, while persistent cookies will remain on your device after you close your browser, and can be used again the next time you access the Platform.</p>

		<p><b>Other technologies</b></p>

		<p>The Platform may also use other technologies with similar functionality to cookies, such as web beacons and tracking URLs to obtain Log Data about users. We may also use web beacons and tracking URLs in our messages to you to determine whether you have opened a certain message or accessed a certain link.</p>

		<p><b>Uses for Airbnb cookies</b></p>

		<p>Airbnb uses cookies for a number of purposes, such as the following:
		<br /><ol>
		<br /><li>	to enable, facilitate and streamline the functioning of the Platform across different webpages and browser sessions.</li></p>

		<p><li>	to simplify your access to and use of the Platform and make it more seamless.</li></p>

		<p><li>	to monitor and analyze the performance, operation and effectiveness of the Platform, so that we can improve and optimize it.</li></p>

		<p><li>	to show you content (which may include advertisements) that is more relevant to you.</li>
		<br /></ol></p>

		<p><b>Uses for third party cookies</b></p>

		<p>Our partners’ cookies are intended to obtain information to help them provide services to Airbnb.  For example, third party companies and individuals we engage to provide services to us may track your behavior on our Platform to market and advertise Airbnb listings or services to you on the Platform and third party websites. Third parties that use cookies and other tracking technologies to deliver targeted advertisements on our Platform and/or third party websites may offer you a way to prevent such targeted advertisements by opting-out at the websites of industry groups such as the Network Advertising Initiative (<a href="http://www.networkadvertising.org/choices/" target="_blank">http://www.networkadvertising.org/choices/</a>) and/or the Digital Advertising Alliance (<a href="http://www.aboutads.info/choices/" target="_blank">http://www.aboutads.info/choices/</a>).  You may also be able to control advertising cookies provided by publishers, for example Google’s Ad Preference Manager (<a href="https://www.google.com/settings/ads/onweb/" target="_blank">https://www.google.com/settings/ads/onweb/</a>). Please note that even if you choose to opt-out of receiving targeted advertising, you may still receive advertising on the Platform – it just will not be tailored to your interests. </p>

		<p>In addition, Facebook places a cookie via the Platform that allows Facebook to obtain aggregated, non-Personal Information to optimize their services. For example, if a user clicks on an advertisement for the Airbnb mobile app on Facebook and subsequently installs the app, this cookie will inform Facebook that a user (who is not personally identified) has installed the app after clicking on the advertisement. This cookie may also inform Facebook that a user is using the app, without identifying the specific actions taken by the user in the app.</p>

		<p><b>Disabling Cookies</b></p>

		<p>Most browsers automatically accept cookies, but you can modify your browser setting to decline cookies by visiting the Help portion of your browser’s toolbar. If you choose to decline cookies, please note that you may not be able to sign in, customize, or use some of the interactive features of the Platform. Flash cookies operate differently than browser cookies, and cookie management tools available in a web browser will not remove flash cookies. To learn more about how to manage flash cookies, you can visit the Adobe website (<a href="http://www.adobe.com/" target="_blank">http://www.adobe.com/</a>) and make changes at the Global Privacy Settings Panel (<a href="http://www.macromedia.com/support/documentation/en/flashplayer/help/settings_manager02.html" target="_blank">http://www.macromedia.com/support/documentation/en/flashplayer/help/settings_manager02.html</a>). </p>

		<p><b>Changes to this Cookie Policy</b></p>

		<p>We can change this Cookie Policy at any time.  If we make material changes to the Cookie Policy, we will let you know either by posting the changed Cookie Policy on the Platform or by sending you an email.  </p>

		<p>It’s important that you review the changed Cookie Policy. If you do not wish to agree to the changed Cookie Policy, then we cannot continue to provide the Platform to you, and your only option is to stop accessing the Platform and deactivate your Airbnb account.  You can find out more about how to deactivate your Airbnb account at <a href="http://www.airbnb.com/help" target="_blank">http://www.airbnb.com/help</a>.
		</p>
		</div>
		</div>
	</div>
	<?php require_once("View/footer.php"); ?>
</body>

</html>