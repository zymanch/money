<?php

use yii\db\Migration;

/**
 * Class m181113_123847_init
 */
class m181113_123847_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('protection',[
            'protection_id' => $this->primaryKey()->unsigned(),
            'total_min' => $this->decimal(10,2)->unsigned()->null(),
            'total_max' => $this->decimal(10,2)->unsigned()->notNull(),
            'total_current' => $this->decimal(10,2)->unsigned()->notNull(),
            'day_max' => $this->decimal(10,2)->unsigned()->notNull(),
            'day_current' => $this->decimal(10,2)->unsigned()->notNull(),
            'day' => $this->date()->null(),
            'status' => 'enum("active","blocked","deleted") default "active"',
            'changed' => $this->timestamp(),
        ]);
        $this->createTable('advertiser',[
            'advertiser_id' => $this->primaryKey()->unsigned(),
            'balance' => $this->decimal(10,2)->unsigned()->notNull(),
            'spent' => $this->decimal(10,2)->unsigned()->notNull(),
            'name' => $this->string(256)->null(),
            'status' => 'enum("active","blocked","deleted") default "active"',
            'changed' => $this->timestamp(),
        ]);
        $this->createTable('address',[
            'address_id' => $this->primaryKey()->unsigned(),
            'advertiser_id' => $this->integer()->unsigned()->notNull(),
            'name' => $this->string(256)->null(),
            'address' => $this->text()->null(),
            'latitude' => $this->decimal(9,6)->null(),
            'longitude' => $this->decimal(9,6)->null(),
            'phone' => $this->integer()->unsigned()->null(),
            'site' => $this->string(128)->null(),
            'status' => 'enum("active","blocked","deleted") default "active"',
            'changed' => $this->timestamp(),
        ]);
        $this->addForeignKey('fk_address_advertiser','address','advertiser_id','advertiser','advertiser_id','CASCADE', 'CASCADE');
        $this->createTable('user',[
            'user_id' => $this->primaryKey()->unsigned(),
            'advertiser_id' => $this->integer()->unsigned()->null(),
            'protection_id' => $this->integer()->unsigned()->notNull(),
            'email' => $this->string(64)->notNull(),
            'login' => $this->string(64)->notNull(),
            'password' => $this->string(64)->notNull(),
            'min_payout' => $this->integer()->notNull()->defaultValue(20),
            'max_payout' => $this->integer()->notNull()->defaultValue(10000),
            'max_payout_per_day' => $this->integer()->notNull()->defaultValue(200),
            'rate' => $this->smallInteger()->notNull()->defaultValue(50),
            'type' => 'enum("guest","user","advertizer","admin") default "user"',
            'status' => 'enum("active","blocked","deleted") default "active"',
            'changed' => $this->timestamp(),
        ]);
        $this->addForeignKey('fk_user_advertiser','user','advertiser_id','advertiser','advertiser_id','RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk_user_protection','user','protection_id','protection','protection_id','CASCADE', 'CASCADE');
        $this->createTable('device',[
            'device_id' => $this->primaryKey()->unsigned(),
            'user_id' => $this->integer()->notNull()->unsigned(),
            'imei' => $this->bigInteger()->unsigned()->notNull(),
            'name' => $this->string(256)->null(),
            'status' => 'enum("active","blocked","deleted") default "active"',
            'changed' => $this->timestamp(),
        ]);
        $this->addForeignKey('fk_device_user','device','user_id','user','user_id','CASCADE', 'CASCADE');
        $this->createTable('campaign',[
            'campaign_id' => $this->primaryKey()->unsigned(),
            'user_id' => $this->integer()->notNull()->unsigned(),
            'advertiser_id' => $this->integer()->notNull()->unsigned(),
            'name' => $this->string(256)->null(),
            'total_balance' => $this->integer()->unsigned()->notNull(),
            'current_balance' => $this->integer()->unsigned()->notNull(),
            'protection_id' => $this->integer()->unsigned()->notNull(),
            'address_id' => $this->integer()->unsigned()->notNull(),
            'status' => 'enum("active","blocked","deleted") default "active"',
            'changed' => $this->timestamp(),
        ]);
        $this->addForeignKey('fk_campaign_user','campaign','user_id','user','user_id','RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk_campaign_advertiser','campaign','advertiser_id','advertiser','advertiser_id','RESTRICT', 'RESTRICT');
        $this->addForeignKey('fk_campaign_protection','campaign','protection_id','protection','protection_id','CASCADE', 'CASCADE');
        $this->addForeignKey('fk_campaign_address','campaign','address_id','address','address_id','CASCADE', 'CASCADE');

        $this->createTable('banner',[
            'banner_id' => $this->primaryKey()->unsigned(),
            'campaign_id' => $this->integer()->unsigned()->notNull(),
            'name' => $this->string(256)->null(),
            'filename' => $this->string(128)->notNull(),
            'width' => $this->integer()->notNull()->unsigned(),
            'height' => $this->integer()->notNull()->unsigned(),
            'duration' => $this->integer()->null()->unsigned(),
            'last_show' => $this->timestamp()->null(),
            'status' => 'enum("active","blocked","deleted") default "active"',
            'changed' => $this->timestamp(),
        ]);
        $this->addForeignKey('fk_banner_campaign','banner','campaign_id','campaign','campaign_id','CASCADE', 'CASCADE');
        $this->createTable('hit',[
            'hit_id' => $this->primaryKey()->unsigned(),
            'user_id' => $this->integer()->notNull()->unsigned(),
            'campaign_id' => $this->integer()->notNull()->unsigned(),
            'banner_id' => $this->integer()->notNull()->unsigned(),
            'user_obtain' => $this->decimal(10,2)->unsigned()->notNull(),
            'advertiser_spent' => $this->decimal(10,2)->unsigned()->notNull(),
            'status' => 'enum("active","blocked","deleted") default "active"',
            'changed' => $this->timestamp(),
        ]);
        $this->addForeignKey('fk_hit_user','hit','user_id','user','user_id','CASCADE', 'CASCADE');
        $this->addForeignKey('fk_hit_campaign','hit','campaign_id','campaign','campaign_id','CASCADE', 'CASCADE');
        $this->addForeignKey('fk_hit_banner','hit','banner_id','banner','banner_id','CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181113_123847_init cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181113_123847_init cannot be reverted.\n";

        return false;
    }
    */
}
