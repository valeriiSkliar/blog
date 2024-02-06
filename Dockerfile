FROM ubuntu:latest
LABEL authors="vs"

ENTRYPOINT ["top", "-b"]


RUN chown -R root:root storage \
    && chmod -R 777 storage
