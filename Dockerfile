FROM ubuntu:latest
LABEL authors="vs"

ENTRYPOINT ["top", "-b"]


RUN chown -R www-data:www-data storage \
    && chmod -R 777 storage
