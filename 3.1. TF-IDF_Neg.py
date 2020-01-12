from nltk.stem import WordNetLemmatizer
import Basic_Functions as bfs
from sklearn.feature_extraction.text import TfidfVectorizer
from nltk.stem.porter import *
from collections import Counter
import nltk
import math
import string
from nltk.corpus import stopwords

# my_nltk_script.download('punkt')
# my_nltk_script.download('stopwords')
# my_nltk_script.download('wordnet')


def clean(text):
    remove_punctuation_map = dict((ord(char), None) for char in string.punctuation)
    return text.lower().translate(remove_punctuation_map)


def tokenize(text):
    tokens = nltk.word_tokenize(text)
    return tokens


def remove_stopwords(tokens):
    return [w for w in tokens if not w in stopwords.words('english')]


def lemmatize(tokens, lemmatizer):
    output = []
    for token in tokens:
        output.append(lemmatizer.lemmatize(token))
    return output


def stem(tokens, stemmer):
    stemmed = []
    for item in tokens:
        stemmed.append(stemmer.stem(item))
    return stemmed


def tf(word, count):
    return count[word] / sum(count.values())


def tf_document(document_count):
    output = []
    total = len(document_count)
    for word, count in document_count.items():
        output.append((word, count / total))
    return output


def tf_idf_document(tf_document, corpus):
    output = []
    total = len(corpus)
    for word, tf in tf_document:
        idf = math.log(total / corpus[word])
        print("word: {} total:{} count:{} idf:{}".format(word, total, corpus[word], idf))
        output.append((word, tf * idf))
    return output


def n_containing(word, count_list):
    return sum(1 for count in count_list if word in count)


def idf(word, count_list):
    return math.log(len(count_list) / (n_containing(word, count_list)))


def tfidf(word, count, count_list):
    return tf(word, count) * idf(word, count_list)


tweets = bfs.readJsonFile(name="tweets_neg", folder="data").items()
output_tf_idf = {}
output_dataset_processed = {}
lemmatizer = WordNetLemmatizer()
stemmer = PorterStemmer()
corpus_body_word_list = []

for id, value in tweets:
    text = value
    clean_text = clean(text)

    text_words = remove_stopwords(tokenize(clean_text))

    text_processed = lemmatize(text_words, lemmatizer)

    output_dataset_processed[id] = {
        "body": clean_text,
        "body_processed": text_processed,
    }

    count_body = Counter(text_processed)

    corpus_body_word_list.extend(list(count_body))

    output_tf_idf[id] = {
        "body": tf_document(count_body),
    }

corpus_body = Counter(corpus_body_word_list)

bfs.writeJsonFile(output_tf_idf, "tweets_neg_tf", "data")

for i, document in output_tf_idf.items():
    document["body"] = tf_idf_document(document["body"], corpus_body)

bfs.writeJsonFile(output_tf_idf, "tweets_neg_tf_idf", "data")
bfs.writeJsonFile(output_dataset_processed, "processed_tweets_neg_text", "data")
