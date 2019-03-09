-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2018 at 07:13 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `copies` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `copies`, `description`) VALUES
(1, 'To Kill A Mockingbird', 'Harper Lee', 15, 'To Kill a Mockingbird is a novel by Harper Lee published in 1960. It was immediately successful, winning the Pulitzer Prize, and has become a classic of modern American literature. The plot and characters are loosely based on Lee\'s observations of her family, her neighbors and an event that occurred near her hometown of Monroeville, Alabama, in 1936, when she was 10 years old.'),
(2, 'Pride & Prejudice', 'Austin Lee', 10, 'Pride and Prejudice is a romance novel by Jane Austen, first published in 1813. The story charts the emotional development of the protagonist, Elizabeth Bennet, who learns the error of making hasty judgments and comes to appreciate the difference between the superficial and the essential. The comedy of the writing lies in the depiction of manners, education, marriage and money in the British Regency.'),
(3, 'Jane Eyre', 'Charlotte Bronte', 5, 'Jane Eyre(originally published as Jane Eyre: An Autobiography) is a novel by English writer Charlotte Bronte. It was published on 16 October 1847, by Smith, Elder & Co. of London, England, under the pen name "Currer Bell". The first American edition was published the following year by Harper & Brothers of New York.'),
(4, '1984', 'George Orwell', 15, 'Nineteen Eighty-Four, often published as 1984, is a dystopian novel published in 1949 by English author George Orwell.[2][3] The novel is set in Airstrip One (formerly known as Great Britain), a province of the superstate Oceania in a world of perpetual war, omnipresent government surveillance, and public manipulation. '),
(5, 'The Great Gatsby', 'Scott Fitzgerald', 10, 'The Great Gatsby is a 1925 novel written by American author F. Scott Fitzgerald that follows a cast of characters living in the fictional town of West Egg on prosperous Long Island in the summer of 1922. The story primarily concerns the young and mysterious millionaire Jay Gatsby and his quixotic passion and obsession for the beautiful former debutante Daisy Buchanan.'),
(6, 'The Count of Monte Cristo', 'Alexandre Dumas', 10, 'It is one of the author\'s most popular works, along with The Three Musketeers. Like many of his novels, it was expanded from plot outlines suggested by his collaborating ghostwriter Auguste Maquet. The story takes place in France, Italy, and islands in the Mediterranean during the historical events of 1815 to 1839: the era of the Bourbon Restoration through the reign of Louis-Philippe of France.'),
(7, 'Animal Farm', 'George Orwell', 10, 'Animal Farm is an allegorical novella by George Orwell, first published in England on 17 August 1945. According to Orwell, the book reflects events leading up to the Russian Revolution of 1917 and then on into the Stalinist era of the Soviet Union. The Soviet Union, he believed, had become a brutal dictatorship, built upon a cult of personality and enforced by a reign of terror.'),
(8, 'Little Women', 'Loiusa May Alcott', 10, 'Little Women is a novel by American author Louisa May Alcott (1832-1888), which was originally published in two volumes in 1868 and 1869. Alcott wrote the books rapidly over several months at the request of her publisher. The novel follows the lives of four sisters-Meg, Jo, Beth, and Amy March-detailing their passage from childhood to womanhood, and is loosely based on the author and her three sisters.'),
(9, 'Lord Of The Rings', 'J R R Tolkien', 30, 'he Lord of the Rings is an epic high fantasy novel written by English author and scholar J. R. R. Tolkien. The story began as a sequel to Tolkien\'s 1937 fantasy novel The Hobbit, but eventually developed into a much larger work. Written in stages between 1937 and 1949, The Lord of the Rings is one of the best-selling novels ever written, with over 150 million copies sold.'),
(10, 'The Picture of Dorian Gray', 'Oscar Wilde', 10, 'The Picture of Dorian Gray is a philosophical novel by Oscar Wilde, first published complete in the July 1890 issue of Lippincott\'s Monthly Magazine  Despite that censorship, The Picture of Dorian Gray offended the moral sensibilities of British book reviewers, some of whom said that Oscar Wilde merited prosecution for violating the laws guarding the public morality.'),
(11, 'The Hobbit', 'J R R Tolkien', 20, 'The Hobbit, or There and Back Again is a children\'s fantasy novel by English author J. R. R. Tolkien. It was published on 21 September 1937 to wide critical acclaim, being nominated for the Carnegie Medal and awarded a prize from the New York Herald Tribune for best juvenile fiction. The book remains popular and is recognized as a classic in children\'s literature.'),
(12, 'Hamlet', 'William Shakespeare', 20, 'Set in Denmark, the play dramatises the revenge Prince Hamlet is called to wreak upon his uncle, Claudius, by the ghost of Hamlet\'s father, King Hamlet. Claudius had murdered his own brother and seized the throne, also marrying his deceased brother\'s widow.'),
(13, 'Wuthering Heights', 'Emily Bronte', 5, 'Although Wuthering Heights is now widely regarded as a classic of English literature, contemporary reviews for the novel were deeply polarised; it was considered controversial because its depiction of mental and physical cruelty was unusually stark, and it challenged strict Victorian ideals of the day regarding religious hypocrisy, morality, social classes and gender inequality.'),
(14, 'The Catcher In The Rye', 'J D Salinger', 15, 'Holden Caulfield, a teenager from New York City, is living in an unspecified institution in southern California in 1951. Caulfield intends to live with his brother D.B, an author who Holden resents for becoming a screenplay writer in Hollywood, after his release in one month. As he waits, Holden recalls the events of the previous Christmas.'),
(15, 'Lord Of The Flies', 'William Golding', 10, 'Published in 1954, Lord of the Flies was Golding\'s first novel. Although it was not a great success at the time-selling fewer than three thousand copies in the United States during 1955 before going out of print—it soon went on to become a best-seller. It has been adapted to film twice in English, in 1963 by Peter Brook and 1990 by Harry Hook, and once in Filipino (1975).'),
(16, 'Frankenstein', 'Mary Shelly', 10, 'Frankenstein; or, The Modern Prometheus (or simply, Frankenstein for short), is a novel written by English author Mary Shelley (1797-1851) that tells the story of Victor Frankenstein, a young scientist who creates a grotesque but sapient creature in an unorthodox scientific experiment. Shelley started writing the story when she was 18.'),
(17, 'Crime And Punsihment', 'Fyodor Dostoyevnsky', 5, 'Crime and Punishment focuses on the mental anguish and moral dilemmas of Rodion Raskolnikov, an impoverished ex-student in Saint Petersburg who formulates and executes a plan to kill an unscrupulous pawnbroker for her cash.'),
(18, 'Sense and Sensibility', 'Jane Austin', 10, 'Sense and Sensibility is a novel by Jane Austen, published in 1811. It was published anonymously; By A Lady appears on the cover page where the author\'s name might have been. It tells the story of the Dashwood sisters, Elinor and Marianne, both of age to marry.'),
(19, 'Romeo and Juliet', 'William Shakespeare', 25, 'Romeo and Juliet is a tragedy written by William Shakespeare early in his career about two young star-crossed lovers whose deaths ultimately reconcile their feuding families. It was among Shakespeare\'s most popular plays during his lifetime and along with Hamlet, is one of his most frequently performed plays.'),
(20, 'Farahnheit 451', 'Brad Bradbury', 10, 'Guy Montag is a fireman employed to burn the possessions of those who read outlawed books. He is married and has no children. One fall night while returning from work, he meets his new neighbor, a teenage girl named Clarisse McClellan, whose free-thinking ideals and liberating spirit cause him to question his life and his own perceived happiness.'),
(21, 'Dracula', 'Bram Stalker', 15, 'The story is told in epistolary format, as a series of letters, diary entries, newspaper articles, and ships\' log entries, whose narrators are the novel\'s protagonists, and occasionally supplemented with newspaper clippings relating events not directly witnessed'),
(22, 'Great Expectations', 'Charles Dickens', 15, 'Great Expectations is the thirteenth novel by Charles Dickens and his penultimate completed novel; a bildungsroman that depicts the personal growth and personal development of an orphan nicknamed Pip. It is Dickens\'s second novel, after David Copperfield, to be fully narrated in the first person.'),
(23, 'Les Mieserables', 'Victor Hugo', 20, 'The book which the reader has before him at this moment is, from one end to the other, in its entirety and details ... a progress from evil to good, from injustice to justice, from falsehood to truth, from night to day, from appetite to conscience, from corruption to life; from bestiality to duty, from hell to heaven, from nothingness to God.'),
(24, 'Diary of A Young Girl', 'Anne Frank', 10, 'The Diary of a Young Girl, also known as The Diary of Anne Frank, is a book of the writings from the Dutch language diary kept by Anne Frank while she was in hiding for two years with her family during the Nazi occupation of the Netherlands. The family was apprehended in 1944, and Anne Frank died of typhus in the Bergen-Belsen concentration camp in 1945.'),
(25, 'A Christmas Carol', 'Charles Dickens', 25, 'A Christmas Carol in Prose, Being a Ghost-Story of Christmas, commonly known as A Christmas Carol, is a novella by Charles Dickens, first published in London by Chapman & Hall in 1843; the first edition was illustrated by John Leech. A Christmas Carol tells the story of Ebenezer Scrooge, an old miser who is visited by the ghost of his former business partner.'),
(26, 'A Tale Of Two Cities', 'Charles Dickens', 25, 'A Tale of Two Cities (1859) is a novel by Charles Dickens, set in London and Paris before and during the French Revolution. The novel tells the story of the French Doctor Manette, his 18-year-long imprisonment in the Bastille in Paris and his release to life in London with his daughter Lucie, whom he had never met.'),
(27, 'Tales of Huckleburry Finn', 'Mark Twain', 15, 't is told in the first person by Huckleberry Finn, a friend of Tom Sawyer the narrator of two other Twain novels. It is a direct sequel to The Adventures of Tom Sawyer. The book is noted for its colorful description of people and places along the Mississippi River.'),
(28, 'Persuation', 'Jane Austin', 10, 'The story concerns Anne Elliot, a young Englishwoman of 27 years, whose family is moving to lower their expenses and get out of debt, at the same time as the wars come to an end, putting sailors on shore. They rent their home to an Admiral and his wife.'),
(29, 'Alice in Wonderland', 'Lewis Carol', 15, ' Alice is feeling bored and drowsy while sitting on the riverbank with her older sister, who is reading a book with no pictures or conversations. She then notices a White Rabbit wearing a waistcoat and pocket watch, talking to itself as it runs past.'),
(30, 'The Secret Garden', 'Frances Burnett', 15, 'The Secret Garden is a children\'s novel by Frances Hodgson Burnett first published as a book in 1911, after a version was published as an American magazine serial beginning in 1910. Set in England, it is one of Burnett\'s most popular novels and is considered a classic of English children\'s literature. It\'s one of his best works.'),
(31, 'Gone With The Wind', 'Margett Mitchell', 10, 'Gone with the Wind is a novel by American writer Margaret Mitchell, first published in 1936. The story is set in Clayton County and Atlanta, both in Georgia, during the American Civil War and Reconstruction Era. It depicts the struggles of young Scarlett O\'Hara.'),
(32, 'Macbeth', 'William Shakespeare', 20, 'A brave Scottish general named Macbeth receives a prophecy from a trio of witches that one day he will become King of Scotland. Consumed by ambition and spurred to action by his wife, Macbeth murders King Duncan and takes the Scottish throne for himself.'),
(33, 'Emma', 'Jane Austin', 10, 'Emma, by Jane Austen, is a novel about youthful hubris and the perils of misconstrued romance. The novel was first published in December 1815. As in her other novels, Austen explores the concerns and difficulties of genteel women living in Georgian-Regency England.'),
(34, 'The Grapes of Wrath', 'John Steinback', 15, 'Set during the Great Depression, the novel focuses on the Joads, a poor family of tenant farmers driven from their Oklahoma home by drought, economic hardship, agricultural industry changes and bank foreclosures forcing tenant farmers out of work.'),
(35, 'The Scarlett Letter', 'Nathaneil Hawthorne', 10, 'As Hester looks out over the crowd, she notices a small, misshapen man and recognizes him as her long-lost husband, who has been presumed lost at sea. When the husband sees Hester\'s shame, he asks a man in the crowd about her and is told the story of his wife\'s adultery.'),
(36, 'Of Mice and Men', 'John Steinback', 5, 'Two migrant field workers in California on their plantation during the Great Depression-George Milton, an intelligent but uneducated man, and Lennie Small, a bulky, strong man but mentally disabled-are in Soledad on their way to another part of California.'),
(37, 'Anna Karenina', 'Leo Tolstoy', 10, 'Widely regarded as a pinnacle in realist fiction, Tolstoy considered Anna Karenina his first true novel, after he came to consider War and Peace to be more than a novel.'),
(38, 'Chronicles Of Narnia', 'C S Lewis', 15, 'The books have profoundly influenced adult and children\'s fantasy literature since World War II. Lewis\'s exploration of themes not usually present in children\'s literature, such as religion, as well as the books\' perceived treatment of issues including race and gender, has caused some controversy.'),
(39, 'The Odyssey', 'Homer', 15, 'The poem mainly focuses on the Greek hero Odysseus (known as Ulysses in Roman myths), king of Ithaca, and his journey home after the fall of Troy. It takes Odysseus ten years to reach Ithaca after the ten-year Trojan War.'),
(40, 'Percy Jackson', 'Rick Riordan', 40, 'Percy Jackson & the Olympians, often shortened to Percy Jackson, is a pentalogy of adventure and mythological fiction books written by American author Rick Riordan, and the first book series in the Camp Half-Blood Chronicles.');

-- --------------------------------------------------------

--
-- Table structure for table `issued`
--

CREATE TABLE `issued` (
  `id` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `date1` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issued`
--

INSERT INTO `issued` (`id`, `bid`, `uid`, `date1`) VALUES
(1, 1, 'sanjayshanbhag', '2017-10-01 22:15:32'),
(2, 3, 'sanjayshanbhag', '2017-10-01 22:16:17'),
(3, 5, 'sanjayshanbhag', '2017-10-01 22:17:43'),
(4, 6, 'sanjayshanbhag', '2017-10-01 22:18:19'),
(5, 11, 'sanjayshanbhag', '2017-10-01 22:18:44'),
(6, 1, 'grohit', '2017-10-01 22:19:25'),
(7, 4, 'grohit', '2017-10-01 22:20:16'),
(8, 7, 'grohit', '2017-10-01 22:21:17'),
(9, 14, 'grohit', '2017-10-01 22:21:46'),
(10, 20, 'sanjayshanbhag', '2017-10-02 10:33:50'),
(11, 9, 'grohit', '2017-10-05 07:38:45'),
(12, 15, 'sanjayshanbhag', '2017-10-12 16:19:06'),
(13, 23, 'sanjayshanbhag', '2017-10-12 16:19:14'),
(14, 32, 'grohit', '2017-10-12 16:19:50'),
(15, 40, 'grohit', '2017-10-12 16:20:12'),
(16, 2, 'kaustubhsri', '2017-10-12 16:20:48'),
(17, 17, 'kaustubhsri', '2017-10-12 16:20:55'),
(18, 18, 'kaustubhsri', '2017-10-12 16:21:03'),
(19, 40, 'kaustubhsri', '2017-10-12 16:21:25'),
(20, 13, 'kaustubhsri', '2017-10-12 16:21:40'),
(21, 12, 'sanjayshanbhag', '2017-10-14 05:57:41'),
(22, 1, 'kaustubhsri', '2017-10-15 03:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `bid` int(11) NOT NULL,
  `review` text,
  `date1` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `uid`, `bid`, `review`, `date1`) VALUES
(1, 'sanjayshanbhag', 1, 'This is actually a good book!', '2017-09-29 20:21:49'),
(2, 'sanjayshanbhag', 1, 'Could not put the book down.', '2017-09-29 20:46:57'),
(3, 'grohit', 1, 'Good Book!', '2017-10-05 07:38:10'),
(4, 'sanjayshanbhag', 2, 'Nice Book!', '2017-10-08 15:57:37'),
(5, 'kaustubhsri', 1, 'Nice One.', '2017-10-15 03:47:20'),
(6, 'sanjayshanbhag', 1, 'gdg', '2017-10-16 07:41:40'),
(7, 'sanjayshanbhag', 1, 'Nice Book', '2017-10-19 09:25:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `eml` varchar(255) NOT NULL,
  `address` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uid`, `name`, `pwd`, `eml`, `address`) VALUES
(1, 'sanjayshanbhag', 'Sanjay Shanbhag', '$2y$10$jq3oeIxq..XXAP4u6bFjFOGmtvSyQLtAp5MhyGmd17NPVuuQkuwQq', 'sanjayb.shanbhag@gmail.com', '190, Mysore'),
(2, 'grohit', 'Rohit G', '$2y$10$WkYXvY2nKjyVPcXgAtvFGO2Lnlc/ggQF7CChdjfbx9eHZnI0GNvlm', 'grohit96@gmail.com', '270, Delhi'),
(3, 'kaustubhsri', 'Kaustubh Srivastava', '$2y$10$lbWkiOB3noCz/2336w/aYuB4WwBuzoplG6.KvgAmExOLFgU8ZSjmW', 'kaustubh@gmail.com', '250,Noida'),
(4, 'supreethv', 'Supreeth', '$2y$10$PImYAIdHkQdgdd46EpQhZO8ze4CE1QgyMJXr8Jyr4ZUFgAfvclajK', 'supreeth@gmail.com', 'Bangalore'),
(5, 'gowthamgs', 'Gowtham G S', '$2y$10$klh94E/rfDVXNoeWYm0AIOrSC2cBwE8ePVnWmta7YLwRpptG7X4J.', 'gowtham@gmail.com', 'Bangalore'),
(6, 'tusharpm', 'Tushar P M', '$2y$10$9FxPIPHKEdKSpl3VRbYtt.3ihsQqpzsPTUOqMAnoSJLH4Cyy.gUfq', 'tushar@gmail.com', 'Bangalore'),
(7, 'ranusha', 'Anusha R', '$2y$10$fDznM2kDGFnwPT.9MGDPRewHQCEWzEdC5mnE3aifogDZt35SjRl5u', 'anusha@gmail.com', 'Bangalore'),
(8, 'shashankr', 'Shashank Revanna', '$2y$10$n2WYE.VAEpGm7WnLzERqyehVvxcaBPqtj6U1kM8HqbN01n4.QU2sW', 'shashank@gmail.com', 'Bangalore'),
(9, 'araksha', 'Raksha A', '$2y$10$4cO2Z9rrtnVDrILQF4cC7u/erpUCnYEzCQLBWcVEDXr7jLtVxQUb.', 'raksha@gmail.com', 'Bangalore'),
(10, 'sa', 'sa', '$2y$10$.QfHT5uMg51QpylSgfG1L.A1BwzedVfXEA3.KaPsCJ1hVot59zDXW', 'sanjayb.shanbhag@hotmail.com', 's');

-- --------------------------------------------------------

--
-- Table structure for table `user_tokens`
--

CREATE TABLE `user_tokens` (
  `uid` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `bid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `uid`, `bid`) VALUES
(1, 'sanjayshanbhag', 2),
(2, 'sanjayshanbhag', 8),
(3, 'sanjayshanbhag', 14),
(4, 'sanjayshanbhag', 19),
(5, 'grohit', 26),
(6, 'grohit', 33),
(7, 'grohit', 11),
(8, 'grohit', 10),
(9, 'kaustubhsri', 20),
(10, 'kaustubhsri', 31),
(11, 'kaustubhsri', 7),
(12, 'kaustubhsri', 13),
(13, 'kaustubhsri', 17),
(14, 'sanjayshanbhag', 16),
(15, 'grohit', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issued`
--
ALTER TABLE `issued`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `issued`
--
ALTER TABLE `issued`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
