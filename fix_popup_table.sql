-- Fix popup_banners table structure
ALTER TABLE popup_banners 
DROP COLUMN IF EXISTS subtitle,
DROP COLUMN IF EXISTS button_text,
DROP COLUMN IF EXISTS date_text,
DROP COLUMN IF EXISTS free_label,
DROP COLUMN IF EXISTS application_centers_text,
DROP COLUMN IF EXISTS website_url,
DROP COLUMN IF EXISTS branches;

-- Add link column if not exists
ALTER TABLE popup_banners 
ADD COLUMN IF NOT EXISTS link VARCHAR(255) NULL AFTER title;

