drop database if exists finals;
create database finals;
use finals;
CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    passwd VARCHAR(255) NOT NULL,
    bio text,
    genreOne VARCHAR(25),
    genreTwo VARCHAR(25),
    genreThree VARCHAR(25)
);
CREATE TABLE Collections (
    collection_id INT AUTO_INCREMENT PRIMARY KEY ,
    user_id INT,
    title VARCHAR(100) NOT NULL,
    about TEXT,
    collection_type ENUM('movie', 'character') NOT NULL, 
    constraint FOREIGN KEY (user_id) REFERENCES Users(user_id) on delete cascade on update cascade
);
CREATE TABLE CollectionItems (
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    collection_id INT,
    item_type ENUM('movie', 'character') NOT NULL,
    item_id_in_type INT NOT NULL,
    constraint FOREIGN KEY (collection_id) REFERENCES Collections(collection_id) on delete cascade on update cascade,
    CONSTRAINT uc_collection_item UNIQUE (collection_id, item_type, item_id_in_type)
);

CREATE TABLE Movies (
    movie_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    release_year year,
    genre VARCHAR(50),
    description TEXT
);

CREATE TABLE Characters (
    character_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    movie_id INT,
    constraint FOREIGN KEY (movie_id) REFERENCES Movies(movie_id) on delete cascade on update cascade
);


INSERT INTO Movies (title, release_year, genre, description) VALUES
('Spirited Away', '2001-07-20', 'Fantasy', 'During her family''s move to the suburbs, a sullen 10-year-old girl wanders into a world ruled by gods, witches, and spirits, and where humans are changed into beasts.'),
('Your Name', '2016-08-26', 'Romance', 'Two strangers find themselves linked in a bizarre way. When a connection forms, will distance be the only thing to keep them apart?'),
('Titanic', '1997-12-19', 'Romance', 'A seventeen-year-old aristocrat falls in love with a kind but poor artist aboard the luxurious, ill-fated R.M.S. Titanic.'),
('Avatar the Last Airbender', '2009-12-18', 'Science Fiction', 'Four elemental nations are at war with each other and only the Avatar, master of all four elements, can restore peace. The new Avatar comes in the form of Aang who strives to fulfil his destiny.'),
("Harry Potter and the Philosopher Stone", '2001-11-16', 'Fantasy', "A young wizard named Harry Potter discovers his magical heritage and attends Hogwarts School of Witchcraft and Wizardry, where he uncovers the truth about his parents mysterious deaths and confronts the dark wizard Voldemort.");



INSERT INTO Characters(name, description, movie_id) 
VALUES 
('Haku', "Haku is the deuteragonist of the 2001 animated Studio Ghibli film Spirited Away. He is actually a dragon, who disguises as a human boy. He is the spirit/god of the Kohaku River, as his birth name is Kohakunushi Nigihayami. He had become Yubaba's apprentice to steal her magic, and he also stole that of her twin sister Zeniba. In the original Japanese version, he was voiced by Miyu Irino, while in the English version, he was voiced by Jason Marsden.", 1),
('No Face', "He appears to be a wandering spirit, with no home, family or friends. His form is a black shadow with a Noh mask for a face. He does not appear to have any ears or eyes, and his mouth is only revealed when it opens, whether it is from swallowing or vomiting. He can only speak with the voices of anybody he swallows. When there is nobody in his stomach, he is mute.", 1),
('Chihiro', "She is the main protagonist of Spirited Away. At the beginning, she has to move to a new home with her parents, but encounters an enchanted bathhouse. Her parents are turned into pigs and she is forced to work at the Bathhouse in order to survive.", 1),

("Mitsuha Miyamizu", "She is a high school girl living in the rural town of Itomori, Japan. Bored of the town, she wishes to be a Tokyo boy in her next life. One day, she inexplicably begins to switch bodies intermittently with Taki Tachibana, a high school boy in Tokyo, experiencing their different lives.", 2),
("Taki Tachibana","Taki is a young man with spiky brown hair and grey-blue eyes.Taki has a hardworking and caring personality. He's endlessly loyal towards his friends and has a strong will. In spite of this, Taki has a much shorter temper than Mitsuha. He is rather quick to acting on impulse or anger, resulting in him being covered in band-aids for a large portion of the movie due to his impulsive nature. He can also be very blunt much of the time.", 2),

("Rose DeWitt Bukater", "Rose is a 17-year-old girl from Philadelphia, who is forced into an engagement to 30-year-old Cal Hockley so she and her mother, Ruth, can maintain their high-class status after her father's death had left the family debt-ridden.", 3),
("Jack Dawson", "Jack is portrayed as an itinerant, poor orphan from Chippewa Falls, Wisconsin, who has travelled the world, including Paris. He wins two third-class tickets for the Titanic in a poker game and travels with his friend Fabrizio. He is attracted to Rose at first sight. Her fiancé's invitation to dine with them the next evening enables Jack to mix with the first-class passengers for a night.",3),
("Aang", "Aang was an Air Nomad and the Avatar of his time. As the Avatar he was the only person capable of using all four bending arts: airbending, waterbending, earthbending, and firebending. Shortly before the beginning of the Hundred Year War, Aang was frozen in an iceberg for a hundred years; he later emerged, still biologically twelve years old, into a world engulfed by war.[3] During his absence, the Fire Nation had waged war upon the other nations and managed to completely wipe out the pacifistic Air Nomads. It fell to Aang, the Avatar and the last airbender, to end the War by mastering the other three elements and defeating Fire Lord Ozai. He remained a kind and goofy kid at heart throughout his year-long struggle, despite the overwhelming loss of his people and the heavy burdens he was forced to bear. After his victory over the Phoenix King, Aang began a romantic relationship with his close friend, Katara.", 4),
("Katara", "Katara is a waterbending master.As a teenager, Katara and her brother discovered the young Air Nomad Avatar, Aang, who had been frozen in an iceberg with his bison, Appa, for a century.[14] In need of a waterbending master, the siblings and Aang left the South Pole on a journey toward the Northern Water Tribe.Realizing Aang was the Avatar, Katara and Sokka continued to travel with him across the world as he mastered the remaining elements, earth and fire.", 4),
("Sokka", "Sokka was a Water Tribe warrior of the Southern Water Tribe. Despite his desire to join his father in the fight against the Fire Nation, Sokka was not permitted to accompany the men on the mission and was left behind.[9] As there were no other teenage boys in the tribe, Sokka was the oldest male of his village and, therefore, left as the leader of the tribe. He assumed responsibility for the tribe, haplessly training children to be future warriors until he and his sister discovered an Air Nomad named Aang frozen in an iceberg.",4),
("Toph", "Toph Beifong is an earthbending master, one of the most powerful of her time, and the discoverer of metalbending. Having developed her own unique style of earthbending, Toph acquired a toughened personality and became famous for winning underground earthbending tournaments under the alias 'The Blind Bandit', doing so behind her parents' backs.[8] Although initially uninterested in directly aiding the war effort, she eventually chose to leave behind her old life, and travel with Avatar Aang and his friends as his earthbending teacher, when her parents finally became unbearable for her.[16] Toph's total mastery over earthbending, unique personality, and thoughtful pragmatism made her a valuable addition to the team. After the formation of Republic City after the war, Toph became the city's first Chief of Police, forming the Metalbending Police Force to help maintain order",4),
("Azula", "Azula was a princess of the Fire Nation, daughter of Fire Lord Ozai and Ursa, younger sister of Zuko, and older half-sister of Kiyi. She was a key adversary of Team Avatar,[5] chasing Avatar Aang and her banished brother far across the Earth Kingdom accompanied by her then two best friends, Mai and Ty Lee. A firebending prodigy, Azula was manipulative and obsessed with power. Azula harbored deep mental instabilities, believing her mother loved Zuko more than her.[9] Raised by her father in an environment without a mother-figure, Azula had to be nothing less than perfect in her father's eyes in order to gain affection and attention from him. After her defeat, Azula was put in a mental health facility to recover.Sometime after her exile, Azula returned to the Fire Nation Capital in secret. Having finally accepted that she would never be Fire Lord, Azula resorted to manipulating Zuko so that she could rule through him.When that failed, Azula and her followers resorted to kidnapping children in the capital, setting the city into civil unrest. Though Zuko and his allies were able to rescue the children, Azula and her followers escaped.", 4),
("Harry Potter", "An 11-year-old orphan living with his unwelcoming aunt, uncle, and cousin, who learns of his own fame as a wizard known to have survived his parents' murder at the hands of the dark wizard Lord Voldemort as an infant when he is accepted to Hogwarts School of Witchcraft and Wizardry. ", 5),
("Hermoine Granger","She was an English Muggle-born witch born to Mr and Mrs Granger. At the age of eleven, she learned about her magical nature and was accepted into Hogwarts School of Witchcraft and Wizardry.Hermione first met her future best friends Harry Potter and Ron Weasley aboard the Hogwarts Express, and initially they found her unfriendly and somewhat of an 'insufferable know-it-all'.She later played a crucial role in protecting the Philosopher's Stone from Voldemort.", 5),
("Ronald Weasly", "'Ron' Weasley was an English pure-blood wizard, the sixth and youngest son of Arthur and Molly Weasley He is close friends with fellow student Harry Potter and later Hermione Granger. Together, they made the Golden Trio and faced many challenges during their adolescence, including keeping the Philosopher's Stone from Professor Quirinus Quirrell.", 5);

-- Table for comments
CREATE TABLE Comments (
    CommentID INT PRIMARY KEY AUTO_INCREMENT,
    movie int,
    constraint FOREIGN KEY (movie) REFERENCES Movies(movie_id) on delete cascade on update cascade,
    UserID INT ,
    constraint FOREIGN KEY (UserID) REFERENCES Users(user_id) on delete cascade on update cascade,
    CommentText TEXT,
    DatePosted DATETIME
);

-- Table for comment responses
CREATE TABLE CommentResponses (
    ResponseID INT PRIMARY KEY,
    CommentID INT,
    ResponderID INT,
    ResponseText TEXT,
    DatePosted DATETIME,
    constraint FOREIGN KEY (CommentID) REFERENCES Comments(CommentID) on delete cascade on update cascade
);
