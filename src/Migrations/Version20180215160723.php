<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180215160723 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cart (id INT AUTO_INCREMENT NOT NULL, member_id INT DEFAULT NULL, total NUMERIC(10, 2) NOT NULL, INDEX IDX_BA388B77597D3FE (member_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cart_menu (cart_id INT NOT NULL, menu_id INT NOT NULL, INDEX IDX_92E03AAA1AD5CDBF (cart_id), INDEX IDX_92E03AAACCD7E912 (menu_id), PRIMARY KEY(cart_id, menu_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cart_product (cart_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_2890CCAA1AD5CDBF (cart_id), INDEX IDX_2890CCAA4584665A (product_id), PRIMARY KEY(cart_id, product_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cart_tag (cart_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_3399A4C01AD5CDBF (cart_id), INDEX IDX_3399A4C0BAD26311 (tag_id), PRIMARY KEY(cart_id, tag_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE member (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(50) NOT NULL, lastname VARCHAR(50) NOT NULL, email VARCHAR(255) NOT NULL, mdp VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, price NUMERIC(10, 2) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_menu (product_id INT NOT NULL, menu_id INT NOT NULL, INDEX IDX_F0ED18324584665A (product_id), INDEX IDX_F0ED1832CCD7E912 (menu_id), PRIMARY KEY(product_id, menu_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_cart (product_id INT NOT NULL, cart_id INT NOT NULL, INDEX IDX_864BAA164584665A (product_id), INDEX IDX_864BAA161AD5CDBF (cart_id), PRIMARY KEY(product_id, cart_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag_product (tag_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_E17B2907BAD26311 (tag_id), INDEX IDX_E17B29074584665A (product_id), PRIMARY KEY(tag_id, product_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag_menu (tag_id INT NOT NULL, menu_id INT NOT NULL, INDEX IDX_930A8525BAD26311 (tag_id), INDEX IDX_930A8525CCD7E912 (menu_id), PRIMARY KEY(tag_id, menu_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cart ADD CONSTRAINT FK_BA388B77597D3FE FOREIGN KEY (member_id) REFERENCES member (id)');
        $this->addSql('ALTER TABLE cart_menu ADD CONSTRAINT FK_92E03AAA1AD5CDBF FOREIGN KEY (cart_id) REFERENCES cart (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cart_menu ADD CONSTRAINT FK_92E03AAACCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cart_product ADD CONSTRAINT FK_2890CCAA1AD5CDBF FOREIGN KEY (cart_id) REFERENCES cart (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cart_product ADD CONSTRAINT FK_2890CCAA4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cart_tag ADD CONSTRAINT FK_3399A4C01AD5CDBF FOREIGN KEY (cart_id) REFERENCES cart (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cart_tag ADD CONSTRAINT FK_3399A4C0BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_menu ADD CONSTRAINT FK_F0ED18324584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_menu ADD CONSTRAINT FK_F0ED1832CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_cart ADD CONSTRAINT FK_864BAA164584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_cart ADD CONSTRAINT FK_864BAA161AD5CDBF FOREIGN KEY (cart_id) REFERENCES cart (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_product ADD CONSTRAINT FK_E17B2907BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_product ADD CONSTRAINT FK_E17B29074584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_menu ADD CONSTRAINT FK_930A8525BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_menu ADD CONSTRAINT FK_930A8525CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cart_menu DROP FOREIGN KEY FK_92E03AAA1AD5CDBF');
        $this->addSql('ALTER TABLE cart_product DROP FOREIGN KEY FK_2890CCAA1AD5CDBF');
        $this->addSql('ALTER TABLE cart_tag DROP FOREIGN KEY FK_3399A4C01AD5CDBF');
        $this->addSql('ALTER TABLE product_cart DROP FOREIGN KEY FK_864BAA161AD5CDBF');
        $this->addSql('ALTER TABLE cart DROP FOREIGN KEY FK_BA388B77597D3FE');
        $this->addSql('ALTER TABLE cart_menu DROP FOREIGN KEY FK_92E03AAACCD7E912');
        $this->addSql('ALTER TABLE product_menu DROP FOREIGN KEY FK_F0ED1832CCD7E912');
        $this->addSql('ALTER TABLE tag_menu DROP FOREIGN KEY FK_930A8525CCD7E912');
        $this->addSql('ALTER TABLE cart_tag DROP FOREIGN KEY FK_3399A4C0BAD26311');
        $this->addSql('ALTER TABLE tag_product DROP FOREIGN KEY FK_E17B2907BAD26311');
        $this->addSql('ALTER TABLE tag_menu DROP FOREIGN KEY FK_930A8525BAD26311');
        $this->addSql('DROP TABLE cart');
        $this->addSql('DROP TABLE cart_menu');
        $this->addSql('DROP TABLE cart_product');
        $this->addSql('DROP TABLE cart_tag');
        $this->addSql('DROP TABLE member');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE product_menu');
        $this->addSql('DROP TABLE product_cart');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE tag_product');
        $this->addSql('DROP TABLE tag_menu');
    }
}
