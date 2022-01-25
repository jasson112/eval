# eval

A developer was given the following task
---------------------------------------

Given a table that has the following fields for contacts (named fields below) - build a Laravel app that will take an uploaded CSV file, read out the columns, and allow the user to map their CSV's columns to the table's fields. Once done import the file into the contacts table.

Any fields that are not mapped, import into a separate custom_attributes table which has "key" and "value" columns that correlate to the CSV column and row value. Make sure to include unit/feature tests along with your code.

Here is the SQL to create the contacts and custom_attributes tables for reference.

CREATE TABLE contacts (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sticky_phone_number_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 256 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE custom_attributes (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `contact_id` bigint(20) unsigned NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 256 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

Armed with this description, the produced the code under the 'webapp' directory.  The task at hand is to:
1.  Download the repo and confirm that the code is working.
2.  If the code is not working, attempt to fix it.
3.  Perform a code review on the repo as though this was produced by one of your work colleagues.

Please return a description of what needed to be fixed, if anything, in addition to your code review comments.
The thoughtfullness and thoroughness of the reivew and analysis will be used as evaluation criteria for your employment at Voxie.
