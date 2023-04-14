-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2023 at 07:07 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mailerlite`
--

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'api_key', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI0IiwianRpIjoiZWEzYWNhYzFjYmUwNzRlMmI1MjAxYmE0NzM2OWYxMjEwYjAzOWQ4NGE2YjE4MmM4NWU4NGRkMDFhZWNjZDBhZTI5NzUwNTNhM2NiM2IyNGQiLCJpYXQiOjE2ODEzNzAxMzYuMDAzMywibmJmIjoxNjgxMzcwMTM2LjAwMzMwMywiZXhwIjo0ODM3MDQzNzM1Ljk5NzY5Mywic3ViIjoiNDI5NTMzIiwic2NvcGVzIjpbXX0.b6_eTfjKYGDjYxIj2zy_Ta9ey4djAd-jcrkO33nwgLfMvwMAqdV6yTqOa7Mv-6YgEHqoK4yYN0mSTRCVYdt5zQplAPOfIqHVOArgSGJNhGv09byo2-evXhFSErqRAeBu1o6WOVEvoKrV0j8h7N9kkgLks30rI8fgnjNfG6Ri_4-Z3gHctp7IDfmNVvSXFsXZNCUt6F-zFLgQf7-9JP_3xBg_KRJFuIbiCcFGV0BVO4d7lSHAIOJNlid2blmvjE7nBXpDXKZmr2wG0DRKj4zPCqVan8ZFpz31i27TJqsNzWAMWmOH9HOtvNXfQRuId0syxe-Fd1kec4wZVqWGuvRC-HtAhpfmkX3i6grb_IYfw_w0GvzqfHmMGbDv6csZVb2rrfSLeyw9Bfkj-9Jp2NwidjMw4472iYkec-wib5aUbmuwN6ForSWF5PvVCFQ_wkkW3UcoaPqihVODS8pQX44kgTdxxlB73rq1cBAvwoOYIL46n1FqQjvO3Ueh7Xk0XZSNUeERGd1MvcL5nYyaUih7yDFj1rw39CtuAMFrjimjlZfVDLZxY7nEHIDrT7vqpvdVTQoke1LTTgDx6XagX8ksZAjqEShMWiUsaAdbzgnGRsWt1kwODgQkZINjSlY1Evs5vqb3AQhiWLDulhg_pORFBxgHqbob5prhreXP2XiNOwc', '2023-04-14 05:51:26', '2023-04-14 05:51:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
