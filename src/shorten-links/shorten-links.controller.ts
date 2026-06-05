import {
  Body,
  Controller,
  Delete,
  Get,
  Param,
  Patch,
  Post,
} from '@nestjs/common';
import { CreateShortenLinkDto } from './dto/create-shorten-link.dto';
import { UpdateShortenLinkDto } from './dto/update-shorten-link.dto';
import { ShortenLinksService } from './shorten-links.service';

@Controller('shorten-links')
export class ShortenLinksController {
  constructor(private readonly shortenLinksService: ShortenLinksService) {}

  @Get()
  findAll() {
    return this.shortenLinksService.findAll();
  }

  @Get(':id')
  findOne(@Param('id') id: string) {
    return this.shortenLinksService.findOne(id);
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
