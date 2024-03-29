import json
import pymysql

def escape_column_name(name):
    # This is meant to mostly do the same thing as the _process_params method
    # of mysql.connector.MySQLCursor, but instead of the final quoting step,
    # we escape any previously existing backticks and quote with backticks.
    converter = mysql.connector.conversion.MySQLConverter()
    return "`" + converter.escape(converter.to_mysql(name)).replace('`', '``') + "`"

db = pymysql.connect("localhost", "root", "", "lancewgc_cuhacking2020")
cursor = db.cursor()

# Enter your keys/secrets as strings in the following fields
credentials = {}
credentials['CONSUMER_KEY'] = 'fFZGLLngGBtfNXV7U57DWnUNv'
credentials['CONSUMER_SECRET'] = 'ggxqQqa1BdPP7tUxOby0rItNjHi28ZJgydGK8l3xO8fFoMbz5w'
credentials['ACCESS_TOKEN'] = '3168000791-Vu1jxALCYLQA70AW4FYvxp6cfrjQHkOkDO3HLXu'
credentials['ACCESS_SECRET'] = 'w6KK4553LzofzWIhld1d6yMSqWU0xdZcPh8NsHNzOELrf'

# Save the credentials object to file
with open("twitter_credentials.json", "w") as file:
    json.dump(credentials, file)

# Import the Twython class
from twython import Twython
import json

# Load credentials from json file
with open("twitter_credentials.json", "r") as file:
    creds = json.load(file)

# Instantiate an object
python_tweets = Twython(creds['CONSUMER_KEY'], creds['CONSUMER_SECRET'])

last_id = '1216084524825624577'
row_data = {}
record = True
resume = True
date = 4

while resume:
    record = True
    # Create our query
    query = {'q': '@RBC',
             'count': 1000,
             'max_id': last_id
             }

    result = python_tweets.search(**query)
    result = result["statuses"]

    print("Count {}".format(len(result)))

    if len(result) > 0:
        for data in result:
            last_id = str(data["id"]-1)
            if data["id"] not in row_data:
                print(data)
                row_data[data["id"]] = data

    else:
        resume = False
    date += 1
    print(last_id)

# print(row_data)

# with open('data/data.json', 'w') as outfile:
#     json.dump(row_data, outfile)

for id, data in row_data.items():
    sql = 'INSERT INTO tweet(tweet_id, body) VALUES ("{}", "{}")'.format(id, escape_column_name(data["text"]))
    print(sql)
    cursor.execute(sql)
    db.commit()

