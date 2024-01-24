<?php

namespace Modules\GlobalSetting\database\seeders;

use Illuminate\Database\Seeder;
use Modules\GlobalSetting\app\Models\Setting;

class GlobalSettingInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting_data = [
            "app_name" => "WebSolutionUs",
            "logo" => "websolution-logo.jpg",
            "timezone" => "Asia/Dhaka",
            "favicon" => "websolution-favicon.jpg",
            "cookie_status" => "active",
            "border" => "normal",
            "corners" => "large",
            "background_color" => "#dbca0a",
            "text_color" => "#3bc814",
            "border_color" => "#f1eeee",
            "btn_bg_color" => "#7003c9",
            "btn_text_color" => "#e08e00",
            "link_text" => "Link Text",
            "btn_text" => "Button Text",
            "message" => "this is message",
            "recaptcha_site_key" => "6LeQCfwjAAAoKX9eg",
            "recaptcha_secret_key" => "6LeQCfwjAMsR",
            "recaptcha_status" => "active",
            "tawk_chat_link" => "chat_link",
            "tawk_status" => "active",
            "google_analytic_status" => "active",
            "google_analytic_id" => "google_analytic_id",
            "pixel_status" => "inactive",
            "pixel_app_id" => "pixel_app_id",
            "facebook_login_status" => "active",
            "facebook_app_id" => "facebook_app_id",
            "facebook_app_secret" => "facebook_app_secret",
            "facebook_redirect_url" => "facebook_redirect_url",
            "google_login_status" => "inactive",
            "gmail_client_id" => "gmail_client_id",
            "gmail_secret_id" => "gmail_secret_id",
            "gmail_redirect_url" => "gmail_redirect_url",
            "default_avatar" => "default_avatar.jpg",
            "breadcrumb_image" => "breadcrumb_image.png",
            "mail_host" => "smtp.mailtrap.io",
            "mail_sender_email" => "sender@gmail.com",
            "mail_username" => "5205dacce6b",
            "mail_password" => "589852aa28",
            "mail_port" => "587",
            "mail_encryption" => "ssl",
            "mail_sender_name" => "WebSolutionUs",
            "contact_message_receiver_mail" => "receiver@gmail.com",
            "pusher_app_id" => "pusher_app_id",
            "pusher_app_key" => "pusher_app_key",
            "pusher_app_secret" => "pusher_app_secret",
            "pusher_app_cluster" => "pusher_app_cluster",
            "pusher_status" => "active",
            "club_point_rate" => 1,
            "club_point_status" => 'active'
        ];

        foreach($setting_data as $index => $setting_item){
            $new_item = new Setting();
            $new_item->key = $index;
            $new_item->value = $setting_item;
            $new_item->save();
        }
    }
}
