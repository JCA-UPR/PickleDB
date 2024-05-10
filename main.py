import sqlite3
import re
import json

def parse_js_dict(html_file):
    with open(html_file, 'r') as f:
        content = f.read()

    # Regular expression to find JavaScript variable
    pattern = r'var\s+insertFormData\s*=\s*(\{[\s\S]*?\});'
    match = re.search(pattern, content)

    if match:
        # Extract and parse JavaScript dictionary
        js_dict_str = match.group(1)
        js_dict = json.loads(js_dict_str)

        # Convert JavaScript dictionary to Python dictionary
        py_dict = {key: value for key, value in js_dict.items()}

        return py_dict
    else:
        return None

html_file = 'index.php'
result = parse_js_dict(html_file)

if result:
    print('Python Dictionary:', result)
else:
    print('No JavaScript dictionary found.')

conn = sqlite3.connect('pickle.db')
c = conn.cursor()
# c.execute("""CREATE TABLE brands(
#         name text PRIMARY KEY,
#         estYear integer,
#         based text,
#         CEO text

#    )""")
#c.execute("drop table 'brand'")
#c.execute("""INSERT INTO brands VALUES('Selkirk',2014,'United States','Rob Barnes')""")

#c.execute("SELECT * FROM 'brand' WHERE name='Selkirk'")

print(c.fetchall())

conn.commit()
conn.close()