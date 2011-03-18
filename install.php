<?php
$dbh = new PDO('sqlite:sudoku.sqlite');
$dbh->beginTransaction();
$dbh->exec('CREATE TABLE "sudoku" ("id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL ,"sudoku" TEXT,"rank" INTEGER DEFAULT (0) )');
$s=$dbh->prepare('insert into sudoku (sudoku,rank) values (?,?)');

$s->execute(array(" 7   8     1     4  24  5   8  3   7  52  4  9      8   9  61  7     3     1   4 ",5));
$s->execute(array("3  9       76  4   4      6  6  15   1 4   8   5   7  7      3   8  52       3  4",5));
$s->execute(array(" 9 6  8    3    6   79      1     7 9    3  4 8 4   2      23   6    2    5  8   ",5));
$s->execute(array(" 4 2  8    1   9  6    4     6 1  7 1   2   4 7    3     7    3  8   2    5  3 9 ",5));
$s->execute(array("5   9      6    4   93   7  2   3 5   1 2 9   4     3  6   81   7    3      1   6",5));
$s->execute(array(" 4       9    84  2    13   3 8   7   6   1   1   5 4   87    6  32    7       9 ",5));
$s->execute(array(" 56      1  7  2      92    14 8    8       9    4 35    53      9  8  2      16 ",5));
$s->execute(array("  73  2  3       18  62     734    5         5    849     67  42       6  9  43  ",5));
$s->execute(array("4         9   25    83  1   7  9   65       39  2   4   6  82    76   9         7",5));
$s->execute(array("4       5 2  7 9   1 6      9  1   2 6     1 2    7 3      9 8   3 5  2 8       6",5));

$dbh->commit();