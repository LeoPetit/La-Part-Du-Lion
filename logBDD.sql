CREATE USER "DUTinfo"@"localhost";
SET password FOR "DUTinfo"@"localhost" = password('0000');
CREATE DATABASE projetLP;
GRANT ALL ON projetLP.* TO "DUTinfo"@"localhost";

