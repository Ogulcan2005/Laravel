import webbrowser

def generate_html_form(inputs):
    html = "<form action='submit_form.php' method='post'>\n"  # Verwijzing naar submit_form.php
    for input_type, input_names in inputs.items():
        if input_type == "text":
            for name in input_names:
                html += f'<label for="{name}">{name.capitalize()}:</label>\n'
                html += f'<input type="text" id="{name}" name="{name}"><br>\n'
        elif input_type == "password":
            for name in input_names:
                html += f'<label for="{name}">{name.capitalize()}:</label>\n'
                html += f'<input type="password" id="{name}" name="{name}"><br>\n'
        elif input_type == "email":
            for name in input_names:
                html += f'<label for="{name}">{name.capitalize()}:</label>\n'
                html += f'<input type="email" id="{name}" name="{name}"><br>\n'
        elif input_type == "dropdown":
            html += '<label for="dropdown">Choose a language:</label>\n'
            html += '<select id="dropdown" name="language">\n'
            for lang in input_names:
                html += f'<option value="{lang}">{lang}</option>\n'
            html += '</select><br>\n'
        elif input_type == "checkbox":
            for name in input_names:
                html += f'<input type="checkbox" id="{name}" name="{name}">\n'
                html += f'<label for="{name}">{name.capitalize()}</label><br>\n'
        elif input_type == "datepicker":
            for name in input_names:
                html += f'<label for="{name}">{name.capitalize()}:</label>\n'
                html += f'<input type="date" id="{name}" name="{name}"><br>\n'
    html += '<input type="submit" value="Submit">\n</form>'
    return html

inputs = {
    "text": ["username", "fullname"],
    "password": ["password"],
    "email": ["email"],
    "dropdown": ["NL", "DE", "FR"],
    "checkbox": ["agree_terms"],
    "datepicker": ["birthdate"]
}

generated_html = generate_html_form(inputs)

# Save HTML to a file
html_file_name = "generated_form.html"
with open(html_file_name, "w") as file:
    file.write(generated_html)

# Open the generated HTML file in a web browser
webbrowser.open_new_tab(html_file_name)
