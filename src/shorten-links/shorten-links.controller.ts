import {
  Body,
  Controller,
  Delete,
  Get,
  Param,
  Patch,
  Post,
  UseGuards,
} from '@nestjs/common';
import { JwtAuthGuard } from '../auth/guards/jwt-auth.guard';
import { CreateShortenLinkDto } from './dto/create-shorten-link.dto';
import { UpdateShortenLinkDto } from './dto/update-shorten-link.dto';
import { ShortenLinksService } from './shorten-links.service';

@Controller('shorten-links')
export class ShortenLinksController {
  constructor(private readonly shortenLinksService: ShortenLinksService) {}

  @UseGuards(JwtAuthGuard)
  @Get()
  findAll() {
    return this.shortenLinksService.findAll();
  }

  @UseGuards(JwtAuthGuard)
  @Get(':id')
  findOne(@Param('id') id: string) {
    return this.shortenLinksService.findOne(id);
  }

  @Get('go/:shortened_url')
  findOnebyShortenedUrl(@Param('shortened_url') shortened_url: string) {
    return this.shortenLinksService.findOnebyShortenedUrl(shortened_url);
  }

  @Post()
  create(@Body() createShortenLinkDto: CreateShortenLinkDto) {
    return this.shortenLinksService.create(createShortenLinkDto);
  }

  @Patch(':id')
  update(
    @Param('id') id: string,
    @Body() updateShortenLinkDto: UpdateShortenLinkDto,
  ) {
    return this.shortenLinksService.update(id, updateShortenLinkDto);
  }

  @Delete(':id')
  remove(@Param('id') id: string) {
    return this.shortenLinksService.remove(id);
  }
}
