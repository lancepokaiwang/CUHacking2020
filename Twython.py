import json

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

# Create our query
query = {'q': '@RBC',
         'count': 100,
         }

import pandas as pd

result = python_tweets.search(**query)
result = result["statuses"]

print(len(result))

print(result)

with open('data.json', 'w') as outfile:
    json.dump(result, outfile)

# # Search tweets
# dict_ = {'user': [], 'date': [], 'text': [], 'favorite_count': []}
# for status in python_tweets.search(**query)['statuses']:
#     dict_['user'].append(status['user']['screen_name'])
#     dict_['date'].append(status['created_at'])
#     dict_['text'].append(status['text'])
#     dict_['favorite_count'].append(status['favorite_count'])
#
# # Structure data in a pandas DataFrame for easier manipulation
# df = pd.DataFrame(dict_)
# df.sort_values(by='favorite_count', inplace=True, ascending=False)
# df.head(5)
#
# print(dict_)