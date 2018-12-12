<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181212072829 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE avatar (id INT AUTO_INCREMENT NOT NULL, experience INT NOT NULL, image_url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE choice (id INT AUTO_INCREMENT NOT NULL, questions_id INT DEFAULT NULL, choice LONGTEXT NOT NULL, response TINYINT(1) NOT NULL, INDEX IDX_C1AB5A92BCB134CE (questions_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classroom (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, classroom_code INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classroom_qcm (classroom_id INT NOT NULL, qcm_id INT NOT NULL, INDEX IDX_641AC5686278D5A8 (classroom_id), INDEX IDX_641AC568FF6241A6 (qcm_id), PRIMARY KEY(classroom_id, qcm_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE qcm (id INT AUTO_INCREMENT NOT NULL, theme_id INT DEFAULT NULL, INDEX IDX_D7A1FEF459027487 (theme_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE qcm_questions (qcm_id INT NOT NULL, questions_id INT NOT NULL, INDEX IDX_88501BFAFF6241A6 (qcm_id), INDEX IDX_88501BFABCB134CE (questions_id), PRIMARY KEY(qcm_id, questions_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE questions (id INT AUTO_INCREMENT NOT NULL, question LONGTEXT NOT NULL, experience INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theme (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, icon VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, experience INT DEFAULT NULL, username VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_avatar (user_id INT NOT NULL, avatar_id INT NOT NULL, INDEX IDX_73256912A76ED395 (user_id), INDEX IDX_7325691286383B10 (avatar_id), PRIMARY KEY(user_id, avatar_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_classroom (user_id INT NOT NULL, classroom_id INT NOT NULL, INDEX IDX_499DBD79A76ED395 (user_id), INDEX IDX_499DBD796278D5A8 (classroom_id), PRIMARY KEY(user_id, classroom_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE choice ADD CONSTRAINT FK_C1AB5A92BCB134CE FOREIGN KEY (questions_id) REFERENCES questions (id)');
        $this->addSql('ALTER TABLE classroom_qcm ADD CONSTRAINT FK_641AC5686278D5A8 FOREIGN KEY (classroom_id) REFERENCES classroom (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classroom_qcm ADD CONSTRAINT FK_641AC568FF6241A6 FOREIGN KEY (qcm_id) REFERENCES qcm (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE qcm ADD CONSTRAINT FK_D7A1FEF459027487 FOREIGN KEY (theme_id) REFERENCES theme (id)');
        $this->addSql('ALTER TABLE qcm_questions ADD CONSTRAINT FK_88501BFAFF6241A6 FOREIGN KEY (qcm_id) REFERENCES qcm (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE qcm_questions ADD CONSTRAINT FK_88501BFABCB134CE FOREIGN KEY (questions_id) REFERENCES questions (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_avatar ADD CONSTRAINT FK_73256912A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_avatar ADD CONSTRAINT FK_7325691286383B10 FOREIGN KEY (avatar_id) REFERENCES avatar (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_classroom ADD CONSTRAINT FK_499DBD79A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_classroom ADD CONSTRAINT FK_499DBD796278D5A8 FOREIGN KEY (classroom_id) REFERENCES classroom (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user_avatar DROP FOREIGN KEY FK_7325691286383B10');
        $this->addSql('ALTER TABLE classroom_qcm DROP FOREIGN KEY FK_641AC5686278D5A8');
        $this->addSql('ALTER TABLE user_classroom DROP FOREIGN KEY FK_499DBD796278D5A8');
        $this->addSql('ALTER TABLE classroom_qcm DROP FOREIGN KEY FK_641AC568FF6241A6');
        $this->addSql('ALTER TABLE qcm_questions DROP FOREIGN KEY FK_88501BFAFF6241A6');
        $this->addSql('ALTER TABLE choice DROP FOREIGN KEY FK_C1AB5A92BCB134CE');
        $this->addSql('ALTER TABLE qcm_questions DROP FOREIGN KEY FK_88501BFABCB134CE');
        $this->addSql('ALTER TABLE qcm DROP FOREIGN KEY FK_D7A1FEF459027487');
        $this->addSql('ALTER TABLE user_avatar DROP FOREIGN KEY FK_73256912A76ED395');
        $this->addSql('ALTER TABLE user_classroom DROP FOREIGN KEY FK_499DBD79A76ED395');
        $this->addSql('DROP TABLE avatar');
        $this->addSql('DROP TABLE choice');
        $this->addSql('DROP TABLE classroom');
        $this->addSql('DROP TABLE classroom_qcm');
        $this->addSql('DROP TABLE qcm');
        $this->addSql('DROP TABLE qcm_questions');
        $this->addSql('DROP TABLE questions');
        $this->addSql('DROP TABLE theme');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_avatar');
        $this->addSql('DROP TABLE user_classroom');
    }
}
