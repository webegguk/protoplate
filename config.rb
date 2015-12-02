# this file is purely to demonstrate the differences between compass & libsass and not intended for use with this project.

#require 'compass/import-once/activate'
# Require any additional compass plugins here.
require 'sass-globbing'
require 'compass-normalize'
require 'singularitygs'
require 'breakpoint'
require 'sass-css-importer'

# Set this to the root of your project when deployed:
http_path = "/"
css_dir = "httpdocs/css"
sass_dir = "scss"
images_dir = "httpdocs/images"
javascripts_dir = "httpdocs/js"

# Default to development if environment is not set.
saved = environment
if (environment.nil?)
  environment = :development
else
  environment = saved
end

# You can select your preferred output style here (can be overridden via the command line):
#output_style = :expanded or :nested or :compact or :compressed
output_style = :expanded

# To enable relative paths to assets via compass helper functions. Uncomment:
# relative_assets = true

# Disable line comments in favour of sourcemap support
line_comments = false

# Enable sourcemaps on everything but production
sourcemap = (environment == :production) ? false : true

# Added for compatibility with windows 
Encoding.default_external = 'UTF-8'