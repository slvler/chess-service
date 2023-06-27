import requests


class Api:

    @staticmethod
    def get(url):
        api_url = url
        response = requests.get(api_url)
        print(response.json())