-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Darbinė stotis: localhost
-- Atlikimo laikas: 2014 m. Grd 11 d. 16:43
-- Serverio versija: 5.5.40-0ubuntu0.14.04.1
-- PHP versija: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Duomenų bazė: `students`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `submits`
--

CREATE TABLE IF NOT EXISTS `submits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentID` int(11) NOT NULL,
  `code` text NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Sukurta duomenų kopija lentelei `submits`
--

INSERT INTO `submits` (`id`, `studentID`, `code`, `data`) VALUES
(12, 1311042, 'class Technikai{\r\n	private String vardas;\r\n	private String pavarde;\r\n	private int hNuo;\r\n	private int mNuo;\r\n	private int hIki;\r\n	private int mIki;\r\n\r\n	Technikai(String vardas, String pavarde, \r\n				 int hNuo,   int mNuo, \r\n				 int hIki,   int mIki){\r\n		this.vardas = vardas;\r\n		this.pavarde  = pavarde;\r\n		this.hNuo = hNuo;\r\n		this.mNuo = mNuo;\r\n		this.hIki = hIki;\r\n		this.mIki = mIki;\r\n	}\r\n\r\n\r\n	public String getVardas() {\r\n	    return this.vardas;\r\n	}\r\n\r\n	public String getPavarde() {\r\n	    return this.pavarde;\r\n	}\r\n\r\n	public void setVardas(String vardas) {\r\n	    this.vardas = vardas;\r\n	}\r\n\r\n	public void setPavarde(String pavarde) {\r\n	    this.pavarde = pavarde;\r\n	}\r\n\r\n	public int getHNuo() {\r\n	    return this.hNuo;\r\n	}\r\n\r\n	public int getMNuo() {\r\n	    return this.mNuo;\r\n	}\r\n\r\n	public int getHIki() {\r\n	    return this.hIki;\r\n	}\r\n\r\n	public int getMIki() {\r\n	    return this.mIki;\r\n	}\r\n\r\n	public void setHNuo(int hNuo) {\r\n	    this.hNuo = hNuo;\r\n	}\r\n\r\n	public void setMNuo(int mNuo) {\r\n	    this.mNuo = mNuo;\r\n	}\r\n\r\n	public void setHIki(int hIki) {\r\n	    this.hIki = hIki;\r\n	}\r\n\r\n	public void setMIki(int mIki) {\r\n	    this.mIki = mIki;\r\n	}\r\n\r\n}', '2014-12-11');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
