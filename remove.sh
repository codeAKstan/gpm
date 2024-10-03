#!/bin/bash

# Loop through all files in the current directory and subdirectories
find . -type f | while read file; do
    # Check if the file contains "login.php"
    if grep -q "login.php" "$file"; then
        # Replace "login.php" with "login.php" in the file content
        sed -i 's/login\.html/login\.php/g' "$file"
        echo "Updated $file"
    fi
done

echo "Replacement of 'login.php' with 'login.php' is complete."
