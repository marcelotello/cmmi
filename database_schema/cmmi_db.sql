-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-04-2013 a las 12:03:37
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cmmi_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dashboard_page`
--

CREATE TABLE IF NOT EXISTS `dashboard_page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `path` varchar(1000) DEFAULT NULL,
  `weight` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dashboard_portlet`
--

CREATE TABLE IF NOT EXISTS `dashboard_portlet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dashboard` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned DEFAULT NULL,
  `settings` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `dashboard_portlet`
--

INSERT INTO `dashboard_portlet` (`id`, `dashboard`, `uid`, `settings`) VALUES
(30, 0, 1, 'a:2:{s:4:"News";a:4:{s:6:"column";i:0;s:6:"weight";i:0;s:7:"portlet";s:4:"News";s:7:"visible";b:1;}s:6:"Videos";a:4:{s:6:"column";i:0;s:6:"weight";i:1;s:7:"portlet";s:6:"Videos";s:7:"visible";b:1;}}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `isactive` tinyint(3) unsigned DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `departments_i2` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `departments`
--

INSERT INTO `departments` (`id`, `code`, `description`, `isactive`) VALUES
(1, 'P&H', 'Public & Health', 1),
(2, 'AUTO', 'Automotive', 1),
(3, 'PUB', 'Public ', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `example_work_products`
--

CREATE TABLE IF NOT EXISTS `example_work_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `specific_practices_id_FK` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `example_work_products_FKIndex1` (`specific_practices_id_FK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generic_goals`
--

CREATE TABLE IF NOT EXISTS `generic_goals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `generic_goals_i_2` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `generic_goals`
--

INSERT INTO `generic_goals` (`id`, `code`, `description`) VALUES
(1, 'GG1', 'Performed process'),
(2, 'GG2', 'Managed process'),
(3, 'GG3', 'Defined process');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generic_practices`
--

CREATE TABLE IF NOT EXISTS `generic_practices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `generic_goals_id_FK` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `generic_practices_FKIndex1` (`generic_goals_id_FK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `generic_practices`
--

INSERT INTO `generic_practices` (`id`, `code`, `description`, `generic_goals_id_FK`) VALUES
(1, 'GP1.1', 'Perform Specific Practices', 1),
(2, 'GP2.1', 'Establish an Organizational Policy', 2),
(5, 'GP2.2', 'Establish and maintain the plan for performing the process.', 2),
(6, 'GP2.3', 'Provide adequate resources for performing the process, developing the work products, and providing t', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generic_practice_elaboration`
--

CREATE TABLE IF NOT EXISTS `generic_practice_elaboration` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `generic_practices_id_FK` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `generic_practice_elaboration_FKIndex1` (`generic_practices_id_FK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generic_subpractices`
--

CREATE TABLE IF NOT EXISTS `generic_subpractices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `generic_practices_id_FK` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `generic_subpractices_FKIndex1` (`generic_practices_id_FK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidents`
--

CREATE TABLE IF NOT EXISTS `incidents` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_response_id_FK` int(10) NOT NULL,
  `projects_reviews_id_FK` int(10) unsigned NOT NULL,
  `incident_description` varchar(255) NOT NULL,
  `corrective_action` varchar(255) DEFAULT NULL,
  `incident_date` date NOT NULL,
  `incident_response` varchar(255) DEFAULT NULL,
  `date_response` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `incidents_FKIndex1` (`projects_reviews_id_FK`),
  KEY `incidents_FKIndex2` (`user_response_id_FK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `incidents`
--

INSERT INTO `incidents` (`id`, `user_response_id_FK`, `projects_reviews_id_FK`, `incident_description`, `corrective_action`, `incident_date`, `incident_response`, `date_response`) VALUES
(1, 1, 1, '1231231231231', '1312312', '0000-00-00', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jqcalendar`
--

CREATE TABLE IF NOT EXISTS `jqcalendar` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Subject` varchar(1000) DEFAULT NULL,
  `Location` varchar(200) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `StartTime` datetime DEFAULT NULL,
  `EndTime` datetime DEFAULT NULL,
  `IsAllDayEvent` smallint(6) NOT NULL,
  `Color` varchar(200) DEFAULT NULL,
  `RecurringRule` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `jqcalendar`
--

INSERT INTO `jqcalendar` (`Id`, `Subject`, `Location`, `Description`, `StartTime`, `EndTime`, `IsAllDayEvent`, `Color`, `RecurringRule`) VALUES
(1, 'RevisiÃ³n', 'barcelona', 'REvisar bla bla\n', '2012-07-20 00:00:00', '2012-07-20 00:00:00', 1, '-1', NULL),
(2, 'revisiÃ³n 2', 'asdasdas', 'asdada', '2012-07-20 00:00:00', '2012-07-20 00:00:00', 1, '13', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lookups`
--

CREATE TABLE IF NOT EXISTS `lookups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET latin1 NOT NULL,
  `code` varchar(10) CHARACTER SET latin1 NOT NULL,
  `type` varchar(128) CHARACTER SET latin1 NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `lookups`
--

INSERT INTO `lookups` (`id`, `name`, `code`, `type`, `position`) VALUES
(1, 'Not active', '0', 'active_status', 1),
(2, 'Active', '1', 'active_status', 2),
(3, 'Not Candidate', '0', 'candidate_status', 1),
(4, 'Candidate', '1', 'candidate_status', 2),
(5, 'Pending Approval', '1', 'membership_status', 1),
(6, 'Approved', '2', 'membership_status', 2),
(7, 'Not Approved', '3', 'membership_status', 3),
(8, 'just one time', '1', 'unique_status', 0),
(9, 'every n days', '0', 'unique_status', 1),
(10, 'just one time', '1', 'unique_status', 0),
(11, 'every n days', '0', 'unique_status', 1),
(12, 'red', 'red', 'color_codes', 0),
(13, 'blue', 'blue', 'color_codes', 1),
(15, 'orange', 'orange', 'color_codes', 2),
(16, 'yellow', 'yellow', 'color_codes', 3),
(17, 'green', 'green', 'color_codes', 4),
(18, 'Pending', '0', 'review_status', 0),
(19, 'Passed', '1', 'review_status', 1),
(20, 'Not Passed', '2', 'review_status', 2),
(21, 'Pending information', '3', 'review_status', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maturity_level`
--

CREATE TABLE IF NOT EXISTS `maturity_level` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `level` smallint(5) unsigned NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `maturity_level`
--

INSERT INTO `maturity_level` (`id`, `level`, `description`) VALUES
(1, 1, 'Initial'),
(2, 2, 'Managed'),
(3, 3, 'Defined'),
(4, 4, 'Quantitative Managed'),
(5, 5, 'Optimizing');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `process_area`
--

CREATE TABLE IF NOT EXISTS `process_area` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `purpose_statement` varchar(255) NOT NULL,
  `introductory_notes` text,
  `maturity_level_id_FK` int(10) unsigned NOT NULL,
  `process_area_category_id_FK` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Process_Area_I3` (`code`),
  KEY `Process_Area_FK_I2` (`maturity_level_id_FK`),
  KEY `Process_Area_FKIndex2` (`process_area_category_id_FK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=129 ;

--
-- Volcado de datos para la tabla `process_area`
--

INSERT INTO `process_area` (`id`, `code`, `description`, `purpose_statement`, `introductory_notes`, `maturity_level_id_FK`, `process_area_category_id_FK`) VALUES
(106, 'CAR', 'Causal Analysis and Resolution ss', 'The purpose of Causal Analysis and Resolution (CAR) is to identify causes of selected outcomes and take action to improve process performance. aaa', '<p>Causal analysis and resolution improves quality and productivity by preventing the introduction of defects or problems and by identifying and appropriately incorporating the causes of superior process performance. The Causal Analysis and Resolution process area involves the following activities:</p>\r\n<ul>\r\n<li>Identifying and analyzing causes of selected outcomes. The selected outcomes can represent defects and problems that can be prevented from happening in the future or successes that can be implemented in projects or the organization.</li>\r\n<li>Taking actions to complete the following:</li>\r\n<ul>\r\n<li>&nbsp;Remove causes and prevent the recurrence of those types of defects and problems in the future</li>\r\n<li>&nbsp;Proactively analyze data to identify potential problems and prevent them from occurring</li>\r\n<li>&nbsp;Incorporate the causes of successes into the process to improve future process performance</li>\r\n</ul>\r\n</ul>\r\n<p>Reliance on detecting defects and problems after they have been introduced is not cost effective. It is more effective to prevent defects and problems by integrating Causal Analysis and Resolution activities into each phase of the project. Since similar outcomes may have been previously encountered in other projects or in earlier phases or tasks of the current project, Causal Analysis and Resolution activities are mechanisms for communicating lessons learned among projects. Types of outcomes encountered are analyzed to identify trends. Based on an understanding of the defined process and how it is implemented, root causes of these outcomes and future implications of them are determined. Since it is impractical to perform causal analysis on all outcomes, targets are selected by tradeoffs on estimated investments and estimated returns of quality, productivity, and cycle time. Measurement and analysis processes should already be in place. Existing defined measures can be used, though in some instances new</p>\r\n<p><img src="http://www.proprofs.com/quiz-school/upload/yuiupload/1044922176.jpg" alt="" /></p>', 5, 1),
(107, 'CM', 'Configuration Management', 'The purpose of Configuration Management (CM) is to establish and maintain the integrity of work products using configuration identification, configuration control, configuration status accounting, and configuration audits.', '<p>The Configuration Management process area involves the following activities: Identifying the configuration of selected work products that compose baselines at given points in time Controlling changes to configuration items Building or providing specifications to build work products from the configuration management system Maintaining the integrity of baselines Providing accurate status and current configuration data to developers, end users, and customers The work products placed under configuration management include the products that are delivered to the customer, designated internal work products, acquired products, tools, and other items used in creating and describing these work products. (See the definition of "configuration management" in the glossary.)</p>', 2, 1),
(108, 'DAR', 'Decision Analysis and Resolution', 'The purpose of Decision Analysis and Resolution (DAR) is to analyze\r\npossible decisions using a formal evaluation process that evaluates identified alternatives against established criteria.', '<p>The Decision Analysis and Resolution process area involves establishing guidelines to determine which issues should be subject to a formal<br />evaluation process and applying formal evaluation processes to these<br />issues. A formal evaluation process is a structured approach to evaluating alternative solutions against established criteria to determine a<br />recommended solution. A formal evaluation process involves the following actions: Establishing the criteria for evaluating alternatives Identifying alternative solutions Selecting methods for evaluating alternatives Evaluating alternative solutions using established criteria and methods Selecting recommended solutions from alternatives based on<br />evaluation criteria Rather than using the phrase &ldquo;alternative solutions to address issues&rdquo; each<br />time, in this process area, one of two shorter phrases are used: &ldquo;alternative<br />solutions&rdquo; or &ldquo;alternatives.&rdquo;<br />A formal evaluation process reduces the subjective nature of a decision and&nbsp;provides a higher probability of selecting a solution that meets multiple&nbsp;demands of relevant stakeholders. While the primary application of this process area is to technical concerns,&nbsp;formal evaluation processes can be applied to many nontechnical issues,&nbsp;particularly when a project is being planned. Issues that have multiple&nbsp;alternative solutions and evaluation criteria lend themselves to a formal&nbsp;evaluation process.<br />Trade studies of equipment or software are typical examples of formal evaluation processes. During planning, specific issues requiring a formal evaluation process are&nbsp;identified. Typical issues include selection among architectural or design alternatives, use of reusable or commercial off-the-shelf (COTS)&nbsp;components, supplier selection, engineering support environments or &nbsp;associated tools, test environments, delivery alternatives, and logistics and production. A formal evaluation process can also be used to address a make-or-buy decision, the development of manufacturing processes, the selection of distribution locations, and other decisions.</p>\r\n<p>Guidelines are created for deciding when to use formal evaluation processes to address unplanned issues. Guidelines often suggest using formal evaluation processes when issues are associated with medium-to-high-impact risks or when issues affect the ability to achieve project objectives.</p>\r\n<p><br />Defining an issue well helps to define the scope of alternatives to be considered. The right scope (i.e., not too broad, not too narrow) will aid in making an appropriate decision for resolving the defined issue.<br />Formal evaluation processes can vary in formality, type of criteria, and methods employed. Less formal decisions can be analyzed in a few hours, use few criteria (e.g., effectiveness, cost to implement), and result in a one- or two-page report. More formal decisions can require separate plans, months of effort, meetings to develop and approve criteria, simulations, prototypes, piloting, and extensive documentation.<br />Both numeric and non-numeric criteria can be used in a formal evaluation process. Numeric criteria use weights to reflect the relative importance of criteria. Non-numeric criteria use a subjective ranking scale (e.g., high, medium, low). More formal decisions can require a full trade study.</p>\r\n<p><br />A formal evaluation process identifies and evaluates alternative solutions. The eventual selection of a solution can involve iterative activities of identification and evaluation. Portions of identified alternatives can be combined, emerging technologies can change alternatives, and the business situation of suppliers can change during the evaluation period.<br />A recommended alternative is accompanied by documentation of selected methods, criteria, alternatives, and rationale for the recommendation. The documentation is distributed to relevant stakeholders; it provides a record of the formal evaluation process and rationale, which are useful to other projects that encounter a similar issue.<br />While some of the decisions made throughout the life of the project involve the use of a formal evaluation process, others do not. As mentioned earlier, guidelines should be established to determine which issues should be subject to a formal evaluation process.</p>', 3, 1),
(109, 'IPM', 'Integrated Project Management', 'The purpose of Integrated Project Management (IPM) is to establish and\r\nmanage the project and the involvement of relevant stakeholders according to an integrated and defined process that is tailored from the organization?s\r\nset of standard processes.', '<p>Integrated Project Management involves the following activities: Establishing the project&rsquo;s defined process at project startup by tailoring the organization&rsquo;s set of standard processes<br />Managing the project using the project&rsquo;s defined process<br />Establishing the work environment for the project based on the organization&rsquo;s work environment standards Establishing teams that are tasked to accomplish project objectives Using and contributing to organizational process assets Enabling relevant stakeholders&rsquo; concerns to be identified, considered,<br />and, when appropriate, addressed during the project Ensuring that relevant stakeholders (1) perform their tasks in a<br />coordinated and timely manner; (2) address project requirements, plans, objectives, problems, and risks; (3) fulfill their commitments; and<br />(4) identify, track, and resolve coordination issues<br />The integrated and defined process that is tailored from the organization&rsquo;s<br />set of standard processes is called the project&rsquo;s defined process. (See the definition of &ldquo;project&rdquo; in the glossary.)<br />Managing the project&rsquo;s effort, cost, schedule, staffing, risks, and other factors is tied to the tasks of the project&rsquo;s defined process. The implementation and management of the project&rsquo;s defined process are typically described in the project plan. Certain activities may be covered in<br />other plans that affect the project, such as the quality assurance plan, risk management strategy, and the configuration management plan. Since the defined process for each project is tailored from the<br />organization&rsquo;s set of standard processes, variability among projects is<br />typically reduced and projects can easily share process assets, data, and<br />lessons learned.</p>\r\n<p>This process area also addresses the coordination of all activities associated with the project such as the following:<br />Development activities (e.g., requirements development, design, verification)<br />Service activities (e.g., delivery, help desk, operations, customer contact) Acquisition activities (e.g., solicitation, agreement monitoring, transition to operations)<br />Support activities (e.g., configuration management, documentation, marketing, training)<br />The working interfaces and interactions among relevant stakeholders<br />internal and external to the project are planned and managed to ensure the<br />quality and integrity of the overall endeavor. Relevant stakeholders<br />participate as appropriate in defining the project&rsquo;s defined process and the project plan. Reviews and exchanges are regularly conducted with relevant<br />stakeholders to ensure that coordination issues receive appropriate<br />attention and everyone involved with the project is appropriately aware of<br />status, plans, and activities. (See the definition of &ldquo;relevant stakeholder&rdquo; in<br />the glossary.) In defining the project&rsquo;s defined process, formal interfaces are created as necessary to ensure that appropriate coordination and<br />collaboration occurs. This process area applies in any organizational structure, including projects<br />that are structured as line organizations, matrix organizations, or teams.<br />The terminology should be appropriately interpreted for the organizational<br />structure in place.</p>', 3, 4),
(110, 'MA', 'Measurement and Analysis', 'The purpose of Measurement and Analysis (MA) is to develop and sustain\r\na measurement capability used to support management information needs.', '<p>The Measurement and Analysis process area involves the following activities:<br />Specifying objectives of measurement and analysis so that they are<br />aligned with identified information needs and project, organizational, or business objectives Specifying measures, analysis techniques, and mechanisms for data<br />collection, data storage, reporting, and feedback Implementing the analysis techniques and mechanisms for data<br />collection, data reporting, and feedback Providing objective results that can be used in making informed<br />decisions and taking appropriate corrective action The integration of measurement and analysis activities into the processes of the project supports the following: Objective planning and estimating Tracking actual progress and performance against established plans<br />and objectives Identifying and resolving process related issues Providing a basis for incorporating measurement into additional<br />processes in the future The staff required to implement a measurement capability may or may not<br />be employed in a separate organization-wide program. Measurement<br />capability may be integrated into individual projects or other organizational<br />functions (e.g., quality assurance). The initial focus for measurement activities is at the project level. However,<br />a measurement capability can prove useful for addressing organization- and enterprise-wide information needs. To support this capability,<br />measurement activities should support information needs at multiple levels, including the business, organizational unit, and project to minimize re-work<br />as the organization matures. Projects can store project specific data and results in a project specific repository, but when data are to be used widely or are to be analyzed in&nbsp;</p>\r\n<p>support of determining data trends or benchmarks, data may reside in the organization&rsquo;s measurement repository.<br />Measurement and analysis of product components provided by suppliers is essential for effective management of the quality and costs of the project. It is possible, with careful management of supplier agreements, to provide insight into data that support supplier performance analysis.<br />Measurement objectives are derived from information needs that come from project, organizational, or business objectives. In this process area, when the term &ldquo;objectives&rdquo; is used without the &ldquo;measurement&rdquo; qualifier, it indicates either project, organizational, or business objectives.</p>', 2, 3),
(111, 'OPD', 'Organizational Process Definition', 'The purpose of Organizational Process Definition (OPD) is to establish and maintain a usable set of organizational process assets, work environment standards, and rules and guidelines for teams', '<p>Organizational process assets enable consistent process execution across the organization and provide a basis for cumulative, long-term benefits to the organization. (See the definition of &ldquo;organizational process assets&rdquo; in the glossary.)<br />The organization&rsquo;s process asset library supports organizational learning and process improvement by allowing the sharing of best practices and lessons learned across the organization. (See the definition of &ldquo;organizational process assets&rdquo; in the glossary.)<br />The organization&rsquo;s set of standard processes also describes standard interactions with suppliers. Supplier interactions are characterized by the following typical items: deliverables expected from suppliers, acceptance criteria applicable to those deliverables, standards (e.g., architecture and technology standards), and standard milestone and progress reviews.<br />The organization&rsquo;s &ldquo;set of standard processes&rdquo; is tailored by projects to create their defined processes. Other organizational process assets are used to support tailoring and implementing defined processes. Work environment standards are used to guide the creation of project work environments. Rules and guidelines for teams are used to aid in their structuring, formation, and operation.<br />A &ldquo;standard process&rdquo; is composed of other processes (i.e., subprocesses) or process elements. A &ldquo;process element&rdquo; is the fundamental (i.e., atomic) unit of process definition that describes activities and tasks to consistently perform work. The process architecture provides rules for connecting the process elements of a standard process. The organization&rsquo;s set of standard processes can include multiple process architectures.<br />(See the definitions of &ldquo;standard process,&rdquo; &ldquo;process architecture,&rdquo; &ldquo;subprocess,&rdquo; and &ldquo;process element&rdquo; in the glossary.)</p>\r\n<p>Organizational process assets can be organized in many ways, depending on the<br />implementation of the Organizational Process Definition process area. Examples include the<br />following:<br />Descriptions of lifecycle models can be part of the organization&rsquo;s set of standard<br />processes or they can be documented separately.<br />The organization&rsquo;s set of standard processes can be stored in the organization&rsquo;s<br />process asset library or it can be stored separately.<br />A single repository can contain both measurements and process related<br />documentation, or they can be stored separately.</p>', 3, 1),
(112, 'OPF', 'Organizational Process Focus', 'Organizational Process Focus', NULL, 3, 3),
(113, 'OPM', 'Organizational Performance Management', 'Organizational Performance Management', NULL, 5, 1),
(114, 'OPP', 'Organizational Process Performance', 'Organizational Process Performance', '', 4, 1),
(115, 'OT', 'Organizational Training', 'Organizational Training', '', 3, 1),
(116, 'PMC', 'Project Monitoring and Control', 'Project Monitoring and Control', '', 2, 1),
(117, 'PP', 'Project Planning', 'Project Planning', '', 2, 1),
(118, 'PPQA', 'Process and Product Quality Assurance', 'Process and Product Quality Assurance', '', 2, 1),
(119, 'QPM', 'Quantitative Project Management', 'Quantitative Project Management', '', 4, 1),
(120, 'REQM', 'Requirements Management	', 'The purpose of Requirements Management (REQM) (CMMI-DEV) is to manage requirements of the project?s products and product components and to ensure alignment between those requirements and the project?s plans and work products.', '<p><span>Requirements management processes manage all requirements received or generated by the project, including both technical and nontechnical requirements as well as requirements levied on the project by the organization.</span>&nbsp;In particular, if the Requirements Development process area is implemented, its processes will generate product and product component requirements that will also be managed by the requirements management processes.</p>\r\n<p><span>Throughout the process areas, where the terms &ldquo;product&rdquo; and &ldquo;product component&rdquo; are used, their intended meanings also encompass services, service systems, and their components. When the Requirements Management, Requirements Development, and Technical Solution process areas are all implemented, their associated processes can be closely tied and be performed concurrently.</span></p>\r\n<p class="br">&nbsp;The project takes appropriate steps to ensure that the set of approved requirements is managed to support the planning and execution needs of the project. When a project receives requirements from an approved requirements provider, these requirements are reviewed with the requirements provider to resolve issues and prevent misunderstanding before requirements are incorporated into project plans. Once the requirements provider and the requirements receiver reach an agreement, commitment to the requirements is obtained from project participants. The project manages changes to requirements as they evolve and identifies inconsistencies that occur among plans, work products, and requirements.</p>\r\n<p class="br">&nbsp;Part of managing requirements is documenting requirements changes and their rationale and maintaining bidirectional traceability between source requirements, all product and product component requirements, and other specified work products. (See the definition of &ldquo;bidirectional traceability&rdquo; in the glossary.)</p>\r\n<p class="br">&nbsp;All projects have requirements. In the case of maintenance activities, changes are based on changes to the existing requirements, design, or implementation. In projects that deliver increments of product capability, the changes can also be due to evolving customer needs, technology maturation and obsolescence, and standards evolution. In both cases, the requirements changes, if any, might be documented in change requests from the customer or end users, or they might take the form of new requirements received from the requirements development process. Regardless of their source or form, activities that are driven by changes to requirements are managed accordingly.</p>\r\n<p class="br">&nbsp;In Agile environments, requirements are communicated and tracked through mechanisms such as product backlogs, story cards, and screen mock-ups. Commitments to requirements are either made collectively by the team or an empowered team leader. Work assignments are regularly (e.g., daily, weekly) adjusted based on progress made and as an improved understanding of the requirements and solution emerge. Traceability and consistency across requirements and work products is addressed through the mechanisms already mentioned as well as during start-of-iteration or end-of-iteration activities such as &ldquo;retrospectives&rdquo; and &ldquo;demo days.&rdquo; (See &ldquo;Interpreting CMMI When Using Agile Approaches&rdquo; in Part I.)</p>', 2, 2),
(121, 'RSKM', 'Risk Management	', 'Risk Management	', '', 3, 1),
(122, 'SAM', 'Supplier Agreement Management ', 'Supplier Agreement Management ', '', 1, 1),
(123, 'TS', 'Technical Solution ', 'Technical Solution ', '', 1, 1),
(124, 'VAL', 'Validation ', 'Validation ', '', 1, 1),
(125, 'VER', 'Verification', 'Verification', '', 1, 1),
(126, 'PI', 'Product Integration', 'Product Integration', '', 1, 1),
(127, 'RD', 'Requeriments development', 'Requeriments development', '', 1, 1),
(128, '99', 'Not defined', 'Not defined', '', 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `process_area_category`
--

CREATE TABLE IF NOT EXISTS `process_area_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `hexcolor` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `process_area_category_i_2` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `process_area_category`
--

INSERT INTO `process_area_category` (`id`, `code`, `description`, `hexcolor`) VALUES
(1, 'PRM', 'Process Management', 'blue'),
(2, 'PJM', 'Project Management', 'green'),
(3, 'ENG', 'Engineering', 'red'),
(4, 'SUP', 'Support', 'orange'),
(5, '99', 'Not defined', 'red');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `firstname` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `profiles`
--

INSERT INTO `profiles` (`user_id`, `lastname`, `firstname`) VALUES
(1, 'Admin', 'Administrator'),
(2, 'Demo', 'Demo'),
(3, 'Tello', 'Marcelo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profiles_fields`
--

CREATE TABLE IF NOT EXISTS `profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) CHARACTER SET latin1 NOT NULL,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `field_type` varchar(50) CHARACTER SET latin1 NOT NULL,
  `field_size` varchar(15) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `field_size_min` varchar(15) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `range` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `error_message` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `other_validator` varchar(5000) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `default` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `widget` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `profiles_fields`
--

INSERT INTO `profiles_fields` (`id`, `varname`, `title`, `field_type`, `field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(2, 'firstname', 'First Name', 'VARCHAR', '50', '3', 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `departments_id_FK` int(10) unsigned NOT NULL,
  `code` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `iscandidate` tinyint(3) unsigned NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `isactive` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `projects_i2` (`code`),
  KEY `projects_FKIndex1` (`departments_id_FK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`id`, `departments_id_FK`, `code`, `description`, `iscandidate`, `start_date`, `end_date`, `isactive`) VALUES
(1, 1, 'Example project 1', 'Laboratory Information Systems ', 1, '2012-07-01', '2012-12-31', 1),
(2, 1, 'Example project 2', 'Public Health Information Systems', 0, '2012-07-01', '2012-07-31', 1),
(3, 1, 'Example project 3', 'ESPRICSSHA ', 0, '2012-07-01', '2012-07-04', 1),
(4, 2, 'Example Project 4', 'Project CMMI', 1, '2013-04-05', '2013-06-14', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects_reviews`
--

CREATE TABLE IF NOT EXISTS `projects_reviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `review_date` date DEFAULT NULL,
  `state` tinyint(3) unsigned DEFAULT '0',
  `real_review_date` date DEFAULT NULL,
  `evidence_url` varchar(255) DEFAULT NULL,
  `notes` text,
  `projects_id_FK` int(10) unsigned NOT NULL,
  `review_tasks_coverage_id_FK` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `projects_reviews_FKIndex1` (`projects_id_FK`),
  KEY `projects_review_FKIndex2` (`review_tasks_coverage_id_FK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=216 ;

--
-- Volcado de datos para la tabla `projects_reviews`
--

INSERT INTO `projects_reviews` (`id`, `review_date`, `state`, `real_review_date`, `evidence_url`, `notes`, `projects_id_FK`, `review_tasks_coverage_id_FK`) VALUES
(211, '2013-03-23', 1, '2013-04-11', 'No evidence', '- 23/3/2013 : No evidence\r\n- 11/04/2013: Passed ', 1, 14),
(212, '2013-04-17', 1, '2013-04-17', 'T:\\CARPETA', 'askldja?lskjd', 2, 21),
(213, '2013-04-05', 0, '2013-04-05', '', '', 3, 6),
(214, '2013-04-12', 0, '2013-04-12', '', '', 4, 6),
(215, '2013-04-17', 1, '0000-00-00', '', '', 1, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects_roles`
--

CREATE TABLE IF NOT EXISTS `projects_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `users_id_FK` int(10) NOT NULL,
  `roles_id_FK` int(10) unsigned NOT NULL,
  `projects_id_FK` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `project_roles_i_unique` (`projects_id_FK`,`users_id_FK`,`roles_id_FK`),
  KEY `project_roles_15_FKIndex1` (`projects_id_FK`),
  KEY `project_roles_15_FKIndex2` (`roles_id_FK`),
  KEY `projects_roles_FKIndex3` (`users_id_FK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `projects_roles`
--

INSERT INTO `projects_roles` (`id`, `users_id_FK`, `roles_id_FK`, `projects_id_FK`) VALUES
(9, 1, 4, 1),
(11, 2, 1, 1),
(7, 3, 1, 1),
(5, 3, 4, 2),
(10, 3, 4, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `related_areas`
--

CREATE TABLE IF NOT EXISTS `related_areas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_process_area` int(10) unsigned DEFAULT NULL,
  `description` varchar(200) NOT NULL,
  `process_Area_id_FK` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Related_Areas_FKIndex1` (`process_Area_id_FK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `review_tasks`
--

CREATE TABLE IF NOT EXISTS `review_tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `isactive` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `review_types_id_FK` int(10) unsigned NOT NULL,
  `long_description` text,
  `default_reviewer_id_FK` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `review_tasks_i2` (`code`),
  KEY `review_tasks_FKIndex1` (`review_types_id_FK`),
  KEY `review_tasks_FKIndex2` (`default_reviewer_id_FK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `review_tasks`
--

INSERT INTO `review_tasks` (`id`, `code`, `description`, `isactive`, `review_types_id_FK`, `long_description`, `default_reviewer_id_FK`) VALUES
(1, 'PM1', 'Update Local PMWorkbook', 1, 1, 'Actualizar PM WorkBook', 1),
(2, 'PM2', 'Use EET (Planning & Changes)', 1, 2, 'Use EET (Planning & Changes)', 1),
(3, 'PMC1', 'Consistent data in EPM/SIH/JIRA  ', 1, 4, 'Consistent data in EPM/SIH/JIRA  ', 1),
(4, 'PMC2', '	SIH. Actual work registered & approved weekly.', 1, 1, '	SIH. Actual work registered & approved weekly.', 1),
(5, 'PMC3', '	Jira Project. Actual work & ETC registered (all team) daily. Task status updated online', 1, 1, '	Jira Project. Actual work & ETC registered (all team) daily. Task status updated online', 1),
(6, 'PMC4', '	Check fulfillment Problem Report (include open issues; claims; problems?)', 1, 1, '	Check fulfillment Problem Report (include open issues; claims; problems?)', 1),
(7, 'PMC5', '	Project Status reviewed by xDU Manager', 1, 1, '	Project Status reviewed by xDU Manager', 1),
(8, 'PMC6', '	Show commitment of project team', 1, 1, '	Show commitment of project team', 1),
(9, 'PMC7', '	Show commitment of Customer', 1, 1, '	Show commitment of Customer', 1),
(10, 'REQM1', '	Terms / criteria of project acceptanc', 1, 1, '	Terms / criteria of project acceptanc', 1),
(11, 'REQM2', '	Change management process agreed', 1, 1, '	Change management process agreed', 1),
(12, 'REQM3', '	Existence of SE Tailoring (completed)', 1, 1, '	Existence of SE Tailoring (completed)', 1),
(13, 'REQM4', '	Requirements validated', 1, 1, '	Requirements validated', 1),
(14, 'REQM5', '	Acceptance test plan defined', 1, 1, '	Acceptance test plan defined', 1),
(15, 'REQM6', '	Scope changes documented', 1, 1, '	Scope changes documented', 1),
(16, 'CM1', '	Move folder structure to EPM Environment and Subversion tool', 1, 1, '	Move folder structure to EPM Environment and Subversion tool', 1),
(17, 'CM2', '	Create review and execute CM Plan', 1, 1, '	Create review and execute CM Plan', 1),
(18, 'CM3', '	Register PMBook Baseline', 1, 1, '	Register PMBook Baseline', 1),
(19, 'CM4', '	Create SEBook Baselines', 1, 1, '	Create SEBook Baselines', 1),
(20, 'DAR1', '	Update Management Plan with DAR items ', 1, 1, '	Update Management Plan with DAR items ', 1),
(21, 'DAR2', '	Check fulfillment DAR for overrun decision if is necessary ', 1, 1, '	Check fulfillment DAR for overrun decision if is necessary ', 1),
(22, 'DAR3', '	Check fulfillment DAR for Architecture decision', 1, 1, '	Check fulfillment DAR for Architecture decision', 1),
(23, 'RD4', '	Setup project & use HPQC', 1, 1, '	Setup project & use HPQC', 1),
(24, 'RD5', '	Setup project & use Enterprise Architect', 1, 1, '	Setup project & use Enterprise Architect', 1),
(25, 'VERVAL1', '	Review plan', 1, 1, '	Review plan', 1),
(26, 'VERVAL2', '	Review performance ', 1, 1, '	Review performance ', 1),
(27, 'VERVAL3', '	Test Plan(s) ', 1, 1, '	Test Plan(s) ', 1),
(28, 'VERVAL4', '	Test Execution if running Integration or RollOut phase ', 1, 1, '	Test Execution if running Integration or RollOut phase ', 1),
(29, 'TSPI1', '	Architecture document must exist and contain all relevant sections', 1, 1, '	Architecture document must exist and contain all relevant sections', 1),
(30, 'TSPI2', '	High Level Test Plan must exist and contain all relevant sections', 1, 1, '	High Level Test Plan must exist and contain all relevant sections', 1),
(31, 'TSPI3', '	Design Guide must exist and contain all relevant sections', 1, 1, '	Design Guide must exist and contain all relevant sections', 1),
(32, 'TSPI4', '	Programming Guide and Code Q tools', 1, 1, '	Programming Guide and Code Q tools', 1),
(33, 'TSPI5', '	Appropiate Design Tools are in use for each tecnology ', 1, 1, '	Appropiate Design Tools are in use for each tecnology ', 1),
(34, 'TSPI6', '	Support documentation either existing or planned', 1, 1, '	Support documentation either existing or planned', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `review_task_coverage`
--

CREATE TABLE IF NOT EXISTS `review_task_coverage` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `review_tasks_id_FK` int(10) unsigned NOT NULL,
  `description` varchar(100) NOT NULL,
  `specific_goals_id_FK` int(10) unsigned NOT NULL,
  `process_area_id_FK` int(10) unsigned NOT NULL,
  `process_area_category_id_FK` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `review_task_coverage_FKIndex1` (`process_area_category_id_FK`),
  KEY `review_task_coverage_FKIndex2` (`process_area_id_FK`),
  KEY `review_task_coverage_FKIndex3` (`specific_goals_id_FK`),
  KEY `review_task_coverage_FKIndex4` (`review_tasks_id_FK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `review_task_coverage`
--

INSERT INTO `review_task_coverage` (`id`, `review_tasks_id_FK`, `description`, `specific_goals_id_FK`, `process_area_id_FK`, `process_area_category_id_FK`) VALUES
(6, 1, 'Update a Local PM Workbook', 1, 117, 2),
(10, 2, 'Use EET (Planning & Changes)', 1, 117, 2),
(11, 3, 'Consistent data in EPM/SIH/JIRA  ', 1, 117, 2),
(12, 4, 'SIH. Actual work registered & approved weekly.  ', 1, 116, 2),
(13, 16, 'Move folder structure to EPM Environment and Subversion tool ', 1, 107, 4),
(14, 17, 'Create, review and execute CM Plan ', 1, 107, 4),
(15, 18, 'Register PMBook Baseline ', 1, 107, 4),
(16, 23, 'Setup project & use HPQC ', 1, 127, 3),
(17, 24, 'Setup project & use Enterprise Architect ', 1, 127, 3),
(18, 25, 'Review plan ', 1, 125, 3),
(19, 25, 'Review plan ', 1, 124, 3),
(20, 26, 'Review performance  ', 1, 125, 3),
(21, 26, 'Review performance  ', 1, 124, 3),
(24, 10, 'Terms / criteria of project acceptance', 1, 120, 2),
(25, 21, 'Comprobar el cumplimiento del DAR', 1, 110, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `review_types`
--

CREATE TABLE IF NOT EXISTS `review_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `description` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `every_days` smallint(5) unsigned DEFAULT NULL,
  `isunique` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `review_types_i2` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `review_types`
--

INSERT INTO `review_types` (`id`, `code`, `description`, `every_days`, `isunique`) VALUES
(1, '1', 'Unique review', 0, 1),
(2, '2', 'Every 15 days', 15, 0),
(4, '3', 'Monthly', 30, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rights`
--

CREATE TABLE IF NOT EXISTS `rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `isactive` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `projects_roles_i2` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `code`, `description`, `isactive`) VALUES
(1, 'ANA', 'Analyst', 1),
(2, 'PRG', 'Programmer', 1),
(3, 'TD', 'Technical designer', 1),
(4, 'PM', 'Project Manager', 1),
(5, 'RVW', 'Reviewer', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `specific_goals`
--

CREATE TABLE IF NOT EXISTS `specific_goals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `process_Area_id_FK` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `specific_goals_FKIndex1` (`process_Area_id_FK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `specific_goals`
--

INSERT INTO `specific_goals` (`id`, `code`, `description`, `process_Area_id_FK`) VALUES
(1, '99', 'Not defined', 127);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `specific_practices`
--

CREATE TABLE IF NOT EXISTS `specific_practices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `specific_goals_id_FK` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `specific_practices_FKIndex1` (`specific_goals_id_FK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `specific_subpractices`
--

CREATE TABLE IF NOT EXISTS `specific_subpractices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `specific_practices_id_FK` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subpractices_FKIndex1` (`specific_practices_id_FK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET latin1 NOT NULL,
  `password` varchar(128) CHARACTER SET latin1 NOT NULL,
  `department_id_FK` int(10) unsigned DEFAULT NULL,
  `email` varchar(128) CHARACTER SET latin1 NOT NULL,
  `activkey` varchar(128) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `department_id_FK`, `email`, `activkey`, `create_at`, `lastvisit_at`, `superuser`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, 'webmaster@example.com', '9a24eff8c15a6a141ece27eb6947da0f', '2012-07-18 17:23:46', '2013-04-13 09:45:52', 1, 1),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 0, 'demo@example.com', '099f825543f7850cc038b90aaff39fac', '2012-07-18 17:23:46', '2012-08-09 14:23:59', 0, 1),
(3, 'marcelo', '47be28d73c3c9fa10a08298545aea123', 0, 'marcelotello@gmail.com', '4a8fadd61ae3e5b5b1517c5fab839e15', '2012-07-18 15:50:47', '2012-10-26 16:14:24', 1, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `example_work_products`
--
ALTER TABLE `example_work_products`
  ADD CONSTRAINT `example_work_products_ibfk_1` FOREIGN KEY (`specific_practices_id_FK`) REFERENCES `specific_practices` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `generic_practices`
--
ALTER TABLE `generic_practices`
  ADD CONSTRAINT `generic_practices_ibfk_1` FOREIGN KEY (`generic_goals_id_FK`) REFERENCES `generic_goals` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `generic_practice_elaboration`
--
ALTER TABLE `generic_practice_elaboration`
  ADD CONSTRAINT `generic_practice_elaboration_ibfk_1` FOREIGN KEY (`generic_practices_id_FK`) REFERENCES `generic_practices` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `generic_subpractices`
--
ALTER TABLE `generic_subpractices`
  ADD CONSTRAINT `generic_subpractices_ibfk_1` FOREIGN KEY (`generic_practices_id_FK`) REFERENCES `generic_practices` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `incidents`
--
ALTER TABLE `incidents`
  ADD CONSTRAINT `incidents_ibfk_1` FOREIGN KEY (`user_response_id_FK`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `process_area`
--
ALTER TABLE `process_area`
  ADD CONSTRAINT `process_area_ibfk_1` FOREIGN KEY (`maturity_level_id_FK`) REFERENCES `maturity_level` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `process_area_ibfk_2` FOREIGN KEY (`process_area_category_id_FK`) REFERENCES `process_area_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `user_profile_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`departments_id_FK`) REFERENCES `departments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `projects_reviews`
--
ALTER TABLE `projects_reviews`
  ADD CONSTRAINT `projects_reviews_ibfk_1` FOREIGN KEY (`projects_id_FK`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `projects_reviews_ibfk_2` FOREIGN KEY (`review_tasks_coverage_id_FK`) REFERENCES `review_task_coverage` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `projects_roles`
--
ALTER TABLE `projects_roles`
  ADD CONSTRAINT `projects_roles_ibfk_1` FOREIGN KEY (`roles_id_FK`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `projects_roles_ibfk_2` FOREIGN KEY (`projects_id_FK`) REFERENCES `projects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `projects_roles_ibfk_3` FOREIGN KEY (`users_id_FK`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `related_areas`
--
ALTER TABLE `related_areas`
  ADD CONSTRAINT `related_areas_ibfk_1` FOREIGN KEY (`process_Area_id_FK`) REFERENCES `process_area` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `review_tasks`
--
ALTER TABLE `review_tasks`
  ADD CONSTRAINT `review_tasks_ibfk_1` FOREIGN KEY (`review_types_id_FK`) REFERENCES `review_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `review_tasks_ibfk_2` FOREIGN KEY (`default_reviewer_id_FK`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `review_task_coverage`
--
ALTER TABLE `review_task_coverage`
  ADD CONSTRAINT `review_task_coverage_ibfk_1` FOREIGN KEY (`specific_goals_id_FK`) REFERENCES `specific_goals` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `review_task_coverage_ibfk_2` FOREIGN KEY (`process_area_id_FK`) REFERENCES `process_area` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `review_task_coverage_ibfk_3` FOREIGN KEY (`process_area_category_id_FK`) REFERENCES `process_area_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `review_task_coverage_ibfk_4` FOREIGN KEY (`review_tasks_id_FK`) REFERENCES `review_tasks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `rights`
--
ALTER TABLE `rights`
  ADD CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `specific_goals`
--
ALTER TABLE `specific_goals`
  ADD CONSTRAINT `specific_goals_ibfk_1` FOREIGN KEY (`process_Area_id_FK`) REFERENCES `process_area` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `specific_practices`
--
ALTER TABLE `specific_practices`
  ADD CONSTRAINT `specific_practices_ibfk_1` FOREIGN KEY (`specific_goals_id_FK`) REFERENCES `specific_goals` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `specific_subpractices`
--
ALTER TABLE `specific_subpractices`
  ADD CONSTRAINT `specific_subpractices_ibfk_1` FOREIGN KEY (`specific_practices_id_FK`) REFERENCES `specific_practices` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
